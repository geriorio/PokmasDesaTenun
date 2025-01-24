<?php

namespace App\Http\Controllers;

use App\Models\Purchase;
use App\Models\Expenditures;
use App\Models\Product;
use App\Models\Supplier;
use App\Models\PurchaseDetail;
use App\Models\ForecastExpenditures;
use App\Models\ForecastProduct;
use App\Models\ForecastPurchaseDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

class PurchaseController extends Controller
{
    public function index()
    {
        $data['purchases'] = Purchase::with('supplier', 'purchaseDetails.product')->get();
        $data['products'] = Product::get();
        $data['purchaseDetail'] = PurchaseDetail::all();
        $data['suppliers'] = Supplier::all();
        $data['kurang'] = Product::where('quantity', '<', 60)->get();
        return view('admin.purchasing', $data);
    }
    // Method di ProductController
    public function getProductsBySupplier($supplier_id)
    {
        $products = Product::where('supplier_id', $supplier_id)->orderBy('quantity', 'asc')->get();

        return response()->json($products);
    }

    public function store(Request $request)
    {
        // dd($request->all());
        $data = $request->only('title', 'order_date', 'shipped_date', 'supplier_id');
        $products = $request->get('products'); // Ambil data produk secara terpisah

        $validator = Validator::make(
            $request->all(),
            [
                'order_date' => 'required|date',
                'shipped_date' => 'required|date',
                'supplier_id' => 'required|exists:suppliers,id',
                'products' => 'required|array',
                'products.*.name' => 'required|string',
                'products.*.quantity' => 'required|integer',
                'products.*.price' => 'required|integer',
                'products.*.unit' => 'required|string',
            ],
            [
                'order_date.required' => 'Order date is required.',
                'order_date.date' => 'Order date must be a valid date.',
                'shipped_date.required' => 'Shipped date is required.',
                'shipped_date.date' => 'Shipped date must be a valid date.',
                'supplier_id.required' => 'Supplier is required.',
                'supplier_id.exists' => 'Supplier must exist.',
                'products.required' => 'Products are required.',
                'products.*.name.required' => 'Product name is required.',
                'products.*.quantity.required' => 'Product quantity is required.',
                'products.*.price.required' => 'Product price is required.',
                'products.*.unit.required' => 'Product unit is required.',
            ],
        );

        foreach ($products as $product) {
            $existingProduct = Product::where('name', $product['name'])->first();
            if ($existingProduct && $existingProduct->supplier_id != $data['supplier_id']) {
                return response()->json(['message' => 'Product supplier must be the same as the purchase supplier', 'error' => true]);
            }
        }
        

        if ($validator->fails()) {
            return response()->json(['message' => $validator->errors()->first(), 'error' => true]);
        }

        DB::beginTransaction();
        try {
            $purchase = Purchase::create($data);
            $totalOrderPrice = 0;
            foreach ($products as $productData) {
                $totalPrice = 0;
                $product = ForecastProduct::where('name', $productData['name'])->first();
                if ($product) {
                    $product->quantity += $productData['quantity'];
                    $product->unit = $productData['unit'];
                    $product->price = $productData['price']; //update price yo gir
                    $totalPrice = $productData['price'] * $productData['quantity'];
                    $product->supplier_id = $data['supplier_id'];
                    $product->save();
                } else {
                    $product = ForecastProduct::create([
                        'name' => $productData['name'],
                        'quantity' => $productData['quantity'],
                        'unit' => $productData['unit'],
                        'price' => $productData['price'],
                        'supplier_id' => $data['supplier_id'],
                    ]);
                    $totalPrice += $productData['price'] * $productData['quantity'];                }

                $totalOrderPrice += $totalPrice;

                ForecastPurchaseDetail::create([
                    'purchase_id' => $purchase->id,
                    'product_id' => $product->id,
                    'quantity' => $productData['quantity'],
                    'price' => $productData['price'],
                ]);
            }
            ForecastExpenditures::create([
                'title' => $data['title'],
                'total_price' => $totalOrderPrice,
                'exp_date' => $data['order_date'],
            ]);

            DB::commit();
            return response()->json(['message' => 'Data successfully stored', 'success' => true]);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json(['message' => 'Failed to store data', 'error' => true] . $e->getMessage());
        }
    }

    public function delete(Purchase $purchase)
    {
        $purchase->delete();
        return response()->json(['message' => 'Data successfully deleted', 'success' => true]);
    }

    public function update(Request $request, Purchase $purchase)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'title' => 'required',
                'order_date' => 'required',
                'shipped_date' => 'required',
                'supplier_id' => 'required',
            ],
            [
                'title.required' => 'Title is required.',
                'order_date.required' => 'Order date is required.',
                'shipped_date.required' => 'Shipped date is required.',
                'supplier_id.required' => 'Supplier is required.',
            ],
        );

        if ($validator->fails()) {
            return response()->json(['message' => $validator->errors()->first(), 'error' => true]);
        }

        DB::beginTransaction();

        try {
            $purchase->update($request->only(['title', 'order_date', 'shipped_date', 'supplier_id']));

            DB::commit();
            return response()->json(['message' => 'Data successfully updated', 'success' => true]);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json(['message' => 'Failed to update data', 'error' => true]);
        }
    }

    // fungsi untuk memindahkan data dari table forecast ke actual tabel

    public function accept(Purchase $purchase)
    {
        $purchase['status'] = '1';
        $purchase->save();
        DB::beginTransaction();
        try {
            $forecastPurchaseDetails = ForecastPurchaseDetail::where('purchase_id', $purchase->id)->get();
            $forecastExpenditure = ForecastExpenditures::where('title', $purchase->title)->first();

            foreach ($forecastPurchaseDetails as $forecastDetail) {
                $forecastProduct = ForecastProduct::find($forecastDetail->product_id);
                $product = Product::where('name', $forecastProduct->name)->first();
                if (!$product) {
                    // Create a new product if it doesn't exist
                    $product = Product::create([
                        'name' => $forecastProduct->name,
                        'quantity' => $forecastDetail->quantity,
                        'unit' => $forecastProduct->unit,
                        'price' => $forecastProduct->price,
                        'supplier_id' => $forecastProduct->supplier_id,
                    ]);
                } else {
                    $product->quantity += $forecastDetail->quantity;
                    $product->save();
                }

                // Create purchase detail
                PurchaseDetail::create([
                    'purchase_id' => $purchase->id,
                    'product_id' => $product->id,
                    'quantity' => $forecastDetail->quantity,
                    'price' => $forecastDetail->price,
                ]);
            }

            Expenditures::create([
                'title' => $forecastExpenditure->title,
                'total_price' => $forecastExpenditure->total_price,
                'exp_date' => $forecastExpenditure->exp_date,
            ]);

            ForecastPurchaseDetail::where('purchase_id', $purchase->id)->delete();
            $forecastExpenditure->delete();

            DB::commit();
            return response()->json(['message' => 'Data successfully accepted', 'success' => true]);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json(['message' => 'Failed to accept data: ' . $e->getMessage(), 'error' => true]);
        }
    }
}

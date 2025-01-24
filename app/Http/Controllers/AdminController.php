<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Exception;
use Carbon\Carbon;
use App\Models\Product;
use App\Models\Kategori;
use App\Models\Supplier;
use App\Utils\HttpResponse;
use Illuminate\Http\Request;
use App\Utils\HttpResponseCode;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

class AdminController extends Controller
{
    //

    public function viewKategori()
    {

        $kategori = Kategori::get();
        // dd($kategori);
        $i = 0;
        $data = [];
        foreach ($kategori as $k) {
            $temp = [];
            $temp['id'] = $k->id;
            $temp['no'] = $i + 1;
            $temp['nama'] = $k->name;
            $data[] = $temp;
            $i++;
        }
        $sharedData = [
            'title' => 'Kategori',
            'kategori' => json_encode($data),
        ];
        return view('admin.kategori', $sharedData);
    }

    function store(Request $request)
    {
        $data = $request->only('name');
        // dd($data);
        $valid = validator::make(
            $data,
            [
                'name' => 'required|string|max:255',
            ],
            [
                'name.required' => 'Nama kategori harus diisi',
                'name.string' => 'Nama kategori harus berupa string',
                'name.max' => 'Nama kategori maksimal 255 karakter',
            ],
        );
        if ($valid->fails()) {
            return $this->error($valid->errors()->first(), HttpResponseCode::HTTP_NOT_ACCEPTABLE);
        }
        $kategori = Kategori::create($data);
        return response()->json(['success' => true, 'message' => 'Create new Group', 'data' => $kategori], 201);
    }
    public function updatenama(Request $request, $id)
    {
        $data = $request->only('name');
        $valid = validator::make(
            $data,
            [
                'name' => 'required|string|max:255',
            ],
            [
                'name.required' => 'Nama kategori harus diisi',
                'name.string' => 'Nama kategori harus berupa string',
                'name.max' => 'Nama kategori maksimal 255 karakter',
            ],
        );
        if ($valid->fails()) {
            return $this->error($valid->errors()->first(), HttpResponseCode::HTTP_NOT_ACCEPTABLE);
        }
        $kategori = Kategori::find($id);
        if (!$kategori) {
            return response()->json(['success' => false, 'message' => 'Data not found'], 404);
        }
        $kategori->update($data);
        return response()->json(['success' => true, 'message' => 'Update Category Name Success', 'data' => $kategori], 200);
    }
    function destroy($id)
    {
        $kategori = Kategori::find($id);
        if (!$kategori) {
            return response()->json(['success' => false, 'message' => 'Data not found'], 404);
        }
        $kategori->delete();
        return response()->json(['success' => true, 'message' => 'Data has been deleted'], 200);
    }

    public function viewInventory()
    {
        $kategori = Kategori::get();
        $products = Product::with('kategoris')->get();
        $supplier = Supplier::get();
        $data = [];

        foreach ($products as $product) {
            $temp = [];
            $temp['id'] = $product->id;
            $temp['name'] = $product->name;
            $temp['unit'] = $product->unit;
            $temp['price'] = $product->price;
            $temp['quantity'] = $product->quantity;
            $temp['category'] = $product->kategoris->name ?? 'Belum ada';
            $temp['supplier'] = $product->supplier->name;
            $data[] = $temp;
        }

        $sharedData = [
            'title' => 'Kategori',
            'kategori' => $kategori,
            'supplier' => $supplier,
            'unit' => self::units(),
            'products' => json_encode($data),
        ];


        return view('admin.inventory', $sharedData);
    }

    private static function units()
    {
        return array_map(fn($unit) => $unit->label(), Unit::cases());
    }


    public function storeInventory(Request $request)
    {
        $units = array_map(fn($unit) => $unit->label(), Unit::cases());
        $data = $request->only('name', 'unit', 'price', 'quantity', 'category', 'supplier_id');
        $valid = Validator::make(
            $data,
            [
                'name' => 'required|string|max:255',
                'unit' => 'required|in:' . implode(',', $units),
                'price' => 'required|numeric|min:0',
                'quantity' => 'required|numeric|min:0',
                'category' => 'nullable|exists:kategoris,id',
                'supplier_id' => 'nullable|exists:suppliers,id',
            ],
            [
                'name.required' => 'Nama produk harus diisi',
                'name.string' => 'Nama produk harus berupa string',
                'name.max' => 'Nama produk maksimal 255 karakter',
                'unit.required' => 'Satuan produk harus diisi',
                'unit.in' => 'Satuan produk tidak valid',
                'price.required' => 'Harga produk harus diisi',
                'price.numeric' => 'Harga produk harus berupa angka',
                'price.min' => 'Harga produk minimal 0',
                'quantity.required' => 'Stok produk harus diisi',
                'quantity.numeric' => 'Stok produk harus berupa angka',
                'quantity.min' => 'Stok produk minimal 0',
                'category.exists' => 'Kategori tidak valid',
                'supplier_id.exists' => 'Supplier tidak valid',


            ],
        );
        if ($valid->fails()) {
            return $this->error($valid->errors()->first(), HttpResponseCode::HTTP_NOT_ACCEPTABLE);
        }
        $product = Product::create($data);
        return response()->json(['success' => true, 'message' => 'Create new Product', 'data' => $product], 201);
    }

    public function destroyInventory($id)
    {
        $product = Product::find($id);
        if (!$product) {
            return response()->json(['success' => false, 'message' => 'Data not found'], 404);
        }
        $product->delete();
        return response()->json(['success' => true, 'message' => 'Data has been deleted'], 200);
    }


    public function updateInventory(Request $request, $id)
    {
        $data = $request->only('name', 'unit', 'price', 'quantity', 'category', 'supplier_id');
        $units = array_map(fn($unit) => $unit->label(), Unit::cases());

        $valid = Validator::make(
            $data,
            [
                'name' => 'required|string|max:255',
                'unit' => 'required|in:' . implode(',', $units),
                'price' => 'required|numeric|min:0',
                'quantity' => 'required|numeric|min:0',
                'category' => 'nullable|exists:kategoris,id',
                'supplier_id' => 'nullable|exists:suppliers,id',
            ],
            [
                'name.required' => 'Nama produk harus diisi',
                'name.string' => 'Nama produk harus berupa string',
                'name.max' => 'Nama produk maksimal 255 karakter',
                'unit.required' => 'Satuan produk harus diisi',
                'unit.in' => 'Satuan produk tidak valid',
                'price.required' => 'Harga produk harus diisi',
                'price.numeric' => 'Harga produk harus berupa angka',
                'price.min' => 'Harga produk minimal 0',
                'quantity.required' => 'Stok produk harus diisi',
                'quantity.numeric' => 'Stok produk harus berupa angka',
                'quantity.min' => 'Stok produk minimal 0',
                'category.exists' => 'Kategori tidak valid',
                'supplier_id.exists' => 'Supplier tidak valid',

            ],
        );

        if ($valid->fails()) {
            dd('halo');
            return $this->error($valid->errors()->first(), HttpResponseCode::HTTP_NOT_ACCEPTABLE);
        }

        $product = Product::find($id);
        if (!$product) {
            return response()->json(['success' => false, 'message' => 'Data not found'], 404);
        }

        $product->update($data);
        return response()->json(['success' => true, 'message' => 'Update Product Success', 'data' => $product], 200);
    }

    public function login()
    {

        $data['title'] = 'Admin Login';

        return view('admin.login.login');
    }

    public function logout()
    {
        session()->flush();
        return redirect()->route('admin.login');
    }


    public function auth(Request $request)
    {
        $admin = Admin::where('email', $request->email)->first();

        if (($admin && Hash::check($request->password, $admin->password))) {
            session()->put('id', $admin->id);
            session()->put('email', $admin->email);
            session()->put('name', $admin->name);

            return redirect()->route('viewKategori')->with('success', 'Login berhasil!');
        } else {
            return redirect()->route('admin.login')->with('error', 'Email atau password salah!');
        }
    }
}
enum Unit
{
    case KiloGram;
    case Klosan;

    public function label(): string
    {
        return match ($this) {
            self::KiloGram => 'Kg',
            self::Klosan => 'Klosan',
        };
    }
}

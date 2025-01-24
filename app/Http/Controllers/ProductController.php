<?php

namespace App\Http\Controllers;

use App\Http\Controllers\BaseController;
use App\Models\BarangJual;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProductController extends BaseController
{
    public function __construct(Product $model)
    {
        parent::__construct($model);
    }

    public function index()
    {
        $data['product'] = Product::all();
        return view('admin.product', $data);
    }

    public function catalog()
    {
        $catalog = BarangJual::all();
        $catalogtipe1 = BarangJual::where('tipe', 1)->get();
        $data = [
            'catalog' => $catalog,
            'catalogtipe1' => $catalogtipe1,
        ];
        return view('admin.catalog', $data);
    }

    public function catalogstore(Request $request)
    {
        $data = $request->only(['name', 'price', 'quantity', 'description', 'image']);
        // dd($data);
        $validator = Validator::make(
            $data,
            [
                'name' => 'required|string',
                'price' => 'required|integer',
                'quantity' => 'required|integer',
                'description' => 'required|string',
                'image' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            ],
            [
                'name.required' => 'Nama harus diisi',
                'price.required' => 'Harga harus diisi',
                'quantity.required' => 'Quantity harus diisi',
                'description.required' => 'Deskripsi harus diisi',
                'image.required' => 'Gambar harus diisi',
                'image.image' => 'File harus berupa gambar',
                'image.mimes' => 'File harus berupa gambar dengan format jpeg, png, jpg',
                'image.max' => 'Ukuran gambar maksimal 2MB',
            ],
        );
        if ($validator->fails()) {
            return redirect()->back()->with('error', $validator->errors()->first());
        }
        $file = $request->file('image');
        $path = 'uploads/catalog';
        $originalName = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);
        $extension = $file->getClientOriginalExtension();
        $fileNameToStore = $originalName . '_' . time() . '_' . uniqid() . '.' . $extension;
        $file->storePubliclyAs($path, $fileNameToStore, 'public');

        $finalData = [
            'name' => $data['name'],
            'price' => $data['price'],
            'stock' => $data['quantity'],
            'description' => $data['description'],
            'tipe' => 1,
            'image' => $fileNameToStore,
        ];
        BarangJual::create($finalData);
        return redirect()->back()->with('success', 'Produk berhasil ditambahkan');
    }
    public function edits($id)
    {
        $item = BarangJual::find($id);
        return response()->json($item);
    }

    public function deletecatalog($id)
    {
        // dd('halo');
        $item = BarangJual::find($id);
        $item->delete();
        return response()->json(['success' => true, 'message' => 'Delete Catalog Success', 'data' => $item], 200);
    }
    public function Catalogupdate(Request $request){
        $request = $request->all();
        $validator = Validator::make(
            $request,
            [
                'title' => 'required|string',
                'order_date' => 'required|integer',
                'shipped_date' => 'required|integer',
                'description' => 'required|string',
            ],
            [
                'name.required' => 'Nama harus diisi',
                'price.required' => 'Harga harus diisi',
                'quantity.required' => 'Quantity harus diisi',
                'description.required' => 'Deskripsi harus diisi',
            ],
        );
        if ($validator->fails()) {
            return response()->json(['success' => false, 'message' => $validator->errors()->first()], 400);
        }
        $item = BarangJual::find($request['id']);
        if (!$item) {
            return response()->json(['success' => false, 'message' => 'Data not found'], 404);
        }
        $finalData = [
            'name' => $request['title'],
            'price' => $request['shipped_date'],
            'stock' => $request['order_date'],
            'description' => $request['description'],
        ];
        $item->update($finalData);
        return response()->json(['success' => true, 'message' => 'Update Catalog Success', 'data' => $item], 200);
    }
}

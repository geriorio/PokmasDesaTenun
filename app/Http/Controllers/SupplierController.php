<?php

namespace App\Http\Controllers;

use App\Models\Supplier;
use Illuminate\Http\Request;
use App\Utils\HttpResponse;
use App\Utils\HttpResponseCode;
use Illuminate\Support\Facades\Log;
use Carbon\Carbon;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class SupplierController extends Controller
{
    public function viewSupplier()
    {
        $suppliers = Supplier::get();
        $i = 0;
        $data = [];
        foreach ($suppliers as $supplier) {
            $temp = [];
            $temp['id'] = $supplier->id;
            $temp['no'] = $i + 1;
            $temp['name'] = $supplier->name;
            $temp['address'] = $supplier->address;
            $temp['phone'] = $supplier->phone;
            $temp['email'] = $supplier->email;
            $temp['note'] = $supplier->note;
            $data[] = $temp;
            $i++;
        }
        $sharedData = [
            'title' => 'Supplier',
            'suppliers' => json_encode($data),
        ];
        return view('admin.supplier', $sharedData);
    }

    public function store(Request $request)
    {
        $data = $request->only('name', 'address', 'phone', 'email', 'note');
        $valid = Validator::make(
            $data,
            [
                'name' => 'required|string|max:255',
                'address' => 'required|string|max:255',
                'phone' => 'required|string',
                'email' => 'required|email|max:255',
                'note' => 'nullable|string',
            ],
            [
                'name.required' => 'Nama supplier harus diisi',
                'address.required' => 'Alamat supplier harus diisi',
                'phone.required' => 'Nomor telepon supplier harus diisi',
                'email.required' => 'Email supplier harus diisi',
            ],
        );
        if ($valid->fails()) {
            dd($request->all());
            return $this->error($valid->errors()->first(), HttpResponseCode::HTTP_NOT_ACCEPTABLE);
        }
        // dd($data);
        $supplier = Supplier::create($data);
        return response()->json(['success' => true, 'message' => 'Create new Supplier', 'data' => $supplier], 201);
    }

    public function update(Request $request, $id)
    {
        $data = $request->only('name', 'address', 'phone', 'email', 'note');
        $valid = Validator::make(
            $data,
            [
                'name' => 'required|string|max:255',
                'address' => 'required|string|max:255',
                'phone' => 'required|string',
                'email' => 'required|email|max:255',
                'note' => 'nullable|string',
            ],
            [
                'name.required' => 'Nama supplier harus diisi',
                'address.required' => 'Alamat supplier harus diisi',
                'phone.required' => 'Nomor telepon supplier harus diisi',
            ],
        );
        if ($valid->fails()) {
            return $this->error($valid->errors()->first(), HttpResponseCode::HTTP_NOT_ACCEPTABLE);
        }
        $supplier = Supplier::find($id);
        if (!$supplier) {
            return response()->json(['success' => false, 'message' => 'Data not found'], 404);
        }
        $supplier->update($data);
        return response()->json(['success' => true, 'message' => 'Update Supplier Success', 'data' => $supplier], 200);
    }

    public function destroy($id)
    {
        $supplier = Supplier::find($id);
        if (!$supplier) {
            return response()->json(['success' => false, 'message' => 'Data not found'], 404);
        }
        $supplier->delete();
        return response()->json(['success' => true, 'message' => 'Data has been deleted'], 200);
    }
}
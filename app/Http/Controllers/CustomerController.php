<?php

namespace App\Http\Controllers;

use Exception;
use Carbon\Carbon;
use App\Models\Customer;
use App\Utils\HttpResponse;
use Illuminate\Http\Request;
use App\Utils\HttpResponseCode;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

class CustomerController extends Controller
{
    public function viewCustomer()
    {
        $customers = Customer::get();
        $i = 0;
        $data = [];
        foreach ($customers as $customer) {
            $temp = [];
            $temp['id'] = $customer->id;
            $temp['no'] = $i + 1;
            $temp['name'] = $customer->name;
            $temp['address'] = $customer->address;
            $temp['customer_wa'] = $customer->customer_wa;
            $temp['email'] = $customer->email;
            $temp['password'] = $customer->note;
            $data[] = $temp;
            $i++;
        }
        $sharedData = [
            'title' => 'Customer',
            'customers' => json_encode($data),
        ];
        return view('admin.customer', $sharedData);
    }

    public function update(Request $request, $id)
    {
        
        $data = $request->only('name', 'address', 'customer_wa', 'email');
        // dd($data);
        $valid = Validator::make(
            $data,
            [
                'name' => 'required|string|max:255',
                'address' => 'required|string|max:255',
                'customer_wa' => 'required|string',
                'email' => 'required|email|max:255',
            ],
            [
                'name.required' => 'Nama supplier harus diisi',
                'address.required' => 'Alamat supplier harus diisi',
                'customer_wa.required' => 'Nomor telepon supplier harus diisi',
                'email.required' => 'Email supplier harus diisi',
            ],
        );
        if ($valid->fails()) {
            return $this->error($valid->errors()->first(), 500);
        }
        $customer = Customer::find($id);
        if (!$customer) {
            return response()->json(['success' => false, 'message' => 'Data not found'], 404);
        }
        $customer->update($data);
        return response()->json(['success' => true, 'message' => 'Update Customer Success', 'data' => $customer], 200);
    }

    public function destroy($id)
    {
        $customer = Customer::find($id);
        if (!$customer) {
            return response()->json(['success' => false, 'message' => 'Data not found'], 404);
        }
        $customer->delete();
        return response()->json(['success' => true, 'message' => 'Data has been deleted'], 200);
    }
}
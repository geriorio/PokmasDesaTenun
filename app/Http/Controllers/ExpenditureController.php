<?php

namespace App\Http\Controllers;
use App\Models\Expenditures;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Utils\HttpResponseCode;

class ExpenditureController extends Controller
{
    
    public function viewExpenditure()
    {
        $data['expenditures'] = Expenditures::all();
        return view('admin.expenditure', $data);
    }

    public function storeExpenditure(Request $request)
    {
        $data = $request->only('title', 'total_price', 'exp_date', 'description');
        $validator = Validator::make(
            $request->all(),
            [
                'title' => 'required|string',
                'total_price' => 'required|integer',
                'exp_date' => 'required|date',
            ],
            [
                'title.required' => 'Title is required.',
                'title.string' => 'Title must be a string.',
                'total_price.required' => 'Total price is required.',
                'total_price.integer' => 'Total price must be an integer.',
                'exp_date.required' => 'Expenditure date is required.',
                'exp_date.date' => 'Expenditure date must be a valid date.',
            ],
        );

        if ($validator->fails()) {
            dd($request->all());
            return $this->error($validator->errors()->first(), HttpResponseCode::HTTP_NOT_ACCEPTABLE);
        }
        // dd($data);
        $expenditures = Expenditures::create($data);
        return response()->json(['success' => true, 'message' => 'Create new Pengeluaran', 'data' => $expenditures], 201);
    }

    public function destroy($id)
    {
        $expenditures = Expenditures::find($id);
        if (!$expenditures) {
            return response()->json(['success' => false, 'message' => 'Data not found'], 404);
        }
        $expenditures->delete();
        return response()->json(['success' => true, 'message' => 'Data has been deleted'], 200);
    }

    public function updateExpenditure(Request $request, $id)
    {
        $data = $request->only('title', 'total_price', 'exp_date', 'description');
        $validator = Validator::make(
            $request->all(),
            [
                'title' => 'required|string',
                'total_price' => 'required|integer',
                'exp_date' => 'required|date',
            ],
            [
                'title.required' => 'Title is required.',
                'title.string' => 'Title must be a string.',
                'total_price.required' => 'Total price is required.',
                'total_price.integer' => 'Total price must be an integer.',
                'exp_date.required' => 'Expenditure date is required.',
                'exp_date.date' => 'Expenditure date must be a valid date.',
            ],
        );

        if ($validator->fails()) {
            dd($request->all());
            return $this->error($validator->errors()->first(), HttpResponseCode::HTTP_NOT_ACCEPTABLE);
        }
        $expenditures = Expenditures::find($id);
        if (!$expenditures) {
            return response()->json(['success' => false, 'message' => 'Data not found'], 404);
        }
        $expenditures->update($data);
        return response()->json(['success' => true, 'message' => 'Update Expenditure Success', 'data' => $expenditures], 200);
    }
    
}

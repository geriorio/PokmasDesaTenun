<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PurchaseDetail extends Model
{
    use HasFactory;

    protected $fillable = [
        'purchase_id',
        'product_id',
        'quantity',
        'price'
    ];

    public static function validationRules()
    {
        return [
            'quantity' => 'required|integer',
            'price' => 'required|integer',
            'purchase_id' => 'required|exists:purchases,id',
            'product_id' => 'required|exists:products,id'
        ];
    }

    public static function validationMessages()
    {
        return [
            'quantity.required' => 'Quantity is required',
            'quantity.integer' => 'Quantity must be an integer',
            'price.required' => 'Price is required',
            'price.integer' => 'Price must be an integer',
            'purchase_id.required' => 'Purchase ID is required',
            'purchase_id.exists' => 'Purchase ID is not exists',
            'product_id.required' => 'Product ID is required',
            'product_id.exists' => 'Product ID is not exists'
        ];
    }

    public function purchase()
    {
        return $this->belongsTo(Purchase::class, 'purchase_id', 'id');
    }

    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id', 'id');
    }

}



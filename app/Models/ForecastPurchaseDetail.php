<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ForecastPurchaseDetail extends Model
{
    use HasFactory;

    protected $table = 'forecast_purchase_details';
    protected $fillable = ['purchase_id', 'product_id', 'quantity', 'price'];
}

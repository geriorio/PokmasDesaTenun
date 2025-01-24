<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ForecastProduct extends Model
{
    use HasFactory;
    
    protected $table = 'forecast_products';
    protected $fillable = ['name', 'quantity', 'unit', 'price', 'supplier_id'];
}

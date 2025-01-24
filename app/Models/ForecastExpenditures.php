<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ForecastExpenditures extends Model
{
    use HasFactory;

    protected $table = 'forecast_expenditures';
    protected $fillable = ['title', 'total_price', 'exp_date'];
}

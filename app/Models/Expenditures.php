<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Expenditures extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'total_price',
        'exp_date',
        'description',
    ];
}
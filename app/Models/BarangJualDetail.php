<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BarangJualDetail extends Model
{
    use HasFactory;

    protected $table = 'barang_jual_details';
    protected $fillable = [
        'barang_jual_id',
        'product_id',
    ];

    public function barangJual()
    {
        return $this->belongsTo(BarangJual::class);
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}

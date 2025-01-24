<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SupplierSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $suppliers = [
            [
                'name' => 'PT Benang Abadi',
                'address' => 'Jl. Mayjend Sungkono 5/12',
                'phone' => '0812345678901',
                'email' => 'benangabadi@gmail.com',
            ],
            [
                'name' => 'Pabrik Benang Surabaya',
                'address' => 'Jl. Mayjend Jonosewojo 5/12',
                'phone' => '0819876543210',
                'email' => 'benangabadi@gmail.com',
            ]
        ];

        foreach ($suppliers as $supplier) {
            \App\Models\Supplier::create($supplier);
        }
    }
}

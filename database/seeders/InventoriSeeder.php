<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class InventoriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //

        $data = [
            [
                'name' => 'Benang Merah',
                'quantity' => 100,
                'price' => 10000,
                'unit' => 'klos',
                'category' => 1,
                'supplier_id' => 1,
            ],
            [
                'name' => 'Benang Kuning',
                'quantity' => 20,
                'price' => 20000,
                'unit' => 'klos',
                'category' => 2,
                'supplier_id' => 2,
            ],
            [
                'name' => 'Benang Katun',
                'quantity' => 300,
                'price' => 30000,
                'unit' => 'klos',
                'category' => 3,
                'supplier_id' => 1,
            ],
        ];
        foreach ($data as $d) {
            Product::create($d);
        }
    }
}

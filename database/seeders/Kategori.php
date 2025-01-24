<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class Kategori extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $data = [
            [
                'name' => 'Kategori 1',
            ],
            [
                'name' => 'Kategori 2',
            ],
            [
                'name' => 'Kategori 3',
            ],
            [
                'name' => 'Kategori 4',
            ],
            [
                'name' => 'Kategori 5',
            ],
        ];
        foreach ($data as $d) {
            \App\Models\Kategori::create($d);
        }
    }
}

<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Admin;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(SupplierSeeder::class);
        $this->call(Kategori::class);
        $this->call(InventoriSeeder::class);
        // $this->call(OrderSeeder::class);
        // $this->call(ExpanditureSeeder::class);
        // $this->call(CustomerSeeder::class);
        $this->call(AdminSeeder::class);
    }
}

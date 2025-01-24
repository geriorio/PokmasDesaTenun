<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $admins = [
            [
                'name' => 'Jeffry Hermawan',
                'email' => 'c14220139@john.petra.ac.id',
                'password' => Hash::make('123'),
            ],
            [
                'name' => 'Girvan Witartha',
                'email' => 'c14220167@john.petra.ac.id',
                'password' => Hash::make('123'),
            ],
        ];

        foreach ($admins as $admin) {
            \App\Models\Admin::create($admin);
        }
    }
}

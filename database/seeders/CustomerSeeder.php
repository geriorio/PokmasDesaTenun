<?php

namespace Database\Seeders;

use App\Models\Customer;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $customers = [
            [
                'name' => 'Bree Wales Covington',
                'address' => 'Jalan Siwalankerto I Surabaya',
                'customer_wa' => '084102890536',
                'email' => 'bree@gmail.com',
                'password' => Hash::make('breewc')
            ],
            [
                'name' => 'John Doe',
                'address' => 'Jalan Pahlawan No. 23 Surabaya',
                'customer_wa' => '082134567890',
                'email' => 'john.doe@gmail.com',
                'password' => Hash::make('john123')
            ],
            [
                'name' => 'Jane Smith',
                'address' => 'Jalan Diponegoro No. 45 Malang',
                'customer_wa' => '081234567891',
                'email' => 'jane.smith@gmail.com',
                'password' => Hash::make('jane123')
            ],
            [
                'name' => 'Michael Johnson',
                'address' => 'Jalan Soekarno Hatta No. 67 Bandung',
                'customer_wa' => '083145678912',
                'email' => 'michael.johnson@gmail.com',
                'password' => Hash::make('michael123')
            ],
            [
                'name' => 'Emily Davis',
                'address' => 'Jalan Gajah Mada No. 89 Yogyakarta',
                'customer_wa' => '085123456789',
                'email' => 'emily.davis@gmail.com',
                'password' => Hash::make('emily123')
            ],
            [
                'name' => 'David Brown',
                'address' => 'Jalan Sudirman No. 101 Jakarta',
                'customer_wa' => '081345678901',
                'email' => 'david.brown@gmail.com',
                'password' => Hash::make('david123')
            ]

            ];

            foreach($customers as $customer){
                Customer::create($customer);
            }
    }
}

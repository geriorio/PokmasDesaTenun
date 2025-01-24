<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $orders = [
            // [
            //     'order_date' => '2024-01-05',
            //     'customer_name' => 'John Doe',
            //     'customer_wa' => '081234567890',
            //     'address' => '123 Street A',
            //     'tipe' => 1,
            //     'total_price' => rand(
            //         50000,
            //         200000
            //     )
            // ],
            // [
            //     'order_date' => '2024-01-15',
            //     'customer_name' => 'Jane Smith',
            //     'customer_wa' => '081234567891',
            //     'address' => '456 Street B',
            //     'tipe' => 2,
            //     'total_price' => rand(
            //         50000,
            //         200000
            //     )
            // ],

            // [
            //     'order_date' => '2024-02-10',
            //     'customer_name' => 'Alice Johnson',
            //     'customer_wa' => '081234567892',
            //     'address' => '789 Street C',
            //     'tipe' => 1,
            //     'total_price' => rand(
            //         50000,
            //         200000
            //     )
            // ],

            // [
            //     'order_date' => '2024-02-25',
            //     'customer_name' => 'Bob Brown',
            //     'customer_wa' => '081234567893',
            //     'address' => '101 Street D',
            //     'tipe' => 2,
            //     'total_price' => rand(
            //         50000,
            //         200000
            //     )
            // ],

            // [
            //     'order_date' => '2024-03-05',
            //     'customer_name' => 'Charlie White',
            //     'customer_wa' => '081234567894',
            //     'address' => '202 Street E',
            //     'tipe' => 1,
            //     'total_price' => rand(
            //         50000,
            //         200000
            //     )
            // ],

            // [
            //     'order_date' => '2024-03-18',
            //     'customer_name' => 'David Black',
            //     'customer_wa' => '081234567895',
            //     'address' => '303 Street F',
            //     'tipe' => 2,
            //     'total_price' => rand(
            //         50000,
            //         200000
            //     )
            // ],

            // [
            //     'order_date' => '2024-04-05',
            //     'customer_name' => 'Emma Green',
            //     'customer_wa' => '081234567896',
            //     'address' => '404 Street G',
            //     'tipe' => 1,
            //     'total_price' => rand(
            //         50000,
            //         200000
            //     )
            // ],

            // [
            //     'order_date' => '2024-04-28',
            //     'customer_name' => 'Fiona Blue',
            //     'customer_wa' => '081234567897',
            //     'address' => '505 Street H',
            //     'tipe' => 2,
            //     'total_price' => rand(
            //         50000,
            //         200000
            //     )
            // ],

            // [
            //     'order_date' => '2024-05-12',
            //     'customer_name' => 'George Red',
            //     'customer_wa' => '081234567898',
            //     'address' => '606 Street I',
            //     'tipe' => 1,
            //     'total_price' => rand(
            //         50000,
            //         200000
            //     )
            // ],

            // [
            //     'order_date' => '2024-05-30',
            //     'customer_name' => 'Hannah Yellow',
            //     'customer_wa' => '081234567899',
            //     'address' => '707 Street J',
            //     'tipe' => 2,
            //     'total_price' => rand(
            //         50000,
            //         200000
            //     )
            // ],

            // [
            //     'order_date' => '2024-06-15',
            //     'customer_name' => 'Ian Purple',
            //     'customer_wa' => '081234567800',
            //     'address' => '808 Street K',
            //     'tipe' => 1,
            //     'total_price' => rand(
            //         50000,
            //         200000
            //     )
            // ],

            // [
            //     'order_date' => '2024-06-27',
            //     'customer_name' => 'Jane Orange',
            //     'customer_wa' => '081234567801',
            //     'address' => '909 Street L',
            //     'tipe' => 2,
            //     'total_price' => rand(
            //         50000,
            //         200000
            //     )
            // ],

            // [
            //     'order_date' => '2024-07-02',
            //     'customer_name' => 'Kevin Grey',
            //     'customer_wa' => '081234567802',
            //     'address' => '1010 Street M',
            //     'tipe' => 1,
            //     'total_price' => rand(
            //         50000,
            //         200000
            //     )
            // ],

            // [
            //     'order_date' => '2024-07-18',
            //     'customer_name' => 'Laura Violet',
            //     'customer_wa' => '081234567803',
            //     'address' => '1111 Street N',
            //     'tipe' => 2,
            //     'total_price' => rand(
            //         50000,
            //         200000
            //     )
            // ],

            // [
            //     'order_date' => '2024-08-09',
            //     'customer_name' => 'Mike Cyan',
            //     'customer_wa' => '081234567804',
            //     'address' => '1212 Street O',
            //     'tipe' => 1,
            //     'total_price' => rand(
            //         50000,
            //         200000
            //     )
            // ],

            // [
            //     'order_date' => '2024-08-21',
            //     'customer_name' => 'Nina Pink',
            //     'customer_wa' => '081234567805',
            //     'address' => '1313 Street P',
            //     'tipe' => 2,
            //     'total_price' => rand(
            //         50000,
            //         200000
            //     )
            // ],

            // [
            //     'order_date' => '2024-09-10',
            //     'customer_name' => 'Oliver Maroon',
            //     'customer_wa' => '081234567806',
            //     'address' => '1414 Street Q',
            //     'tipe' => 1,
            //     'total_price' => rand(
            //         50000,
            //         200000
            //     )
            // ],

            // [
            //     'order_date' => '2024-09-30',
            //     'customer_name' => 'Paula Gold',
            //     'customer_wa' => '081234567807',
            //     'address' => '1515 Street R',
            //     'tipe' => 2,
            //     'total_price' => rand(
            //         50000,
            //         200000
            //     )
            // ],

            // [
            //     'order_date' => '2024-10-11',
            //     'customer_name' => 'Quinn Silver',
            //     'customer_wa' => '081234567808',
            //     'address' => '1616 Street S',
            //     'tipe' => 1,
            //     'total_price' => rand(
            //         50000,
            //         200000
            //     )
            // ],

            // [
            //     'order_date' => '2024-10-22',
            //     'customer_name' => 'Rachel Indigo',
            //     'customer_wa' => '081234567809',
            //     'address' => '1717 Street T',
            //     'tipe' => 2,
            //     'total_price' => rand(
            //         50000,
            //         200000
            //     )
            // ],

            // [
            //     'order_date' => '2024-11-05',
            //     'customer_name' => 'Steve Lime',
            //     'customer_wa' => '081234567810',
            //     'address' => '1818 Street U',
            //     'tipe' => 1,
            //     'total_price' => rand(
            //         50000,
            //         200000
            //     )
            // ],

            // [
            //     'order_date' => '2024-11-18',
            //     'customer_name' => 'Tina Navy',
            //     'customer_wa' => '081234567811',
            //     'address' => '1919 Street V',
            //     'tipe' => 2,
            //     'total_price' => rand(
            //         50000,
            //         200000
            //     )
            // ],

            // [
            //     'order_date' => '2024-12-01',
            //     'customer_name' => 'Uma Aqua',
            //     'customer_wa' => '081234567812',
            //     'address' => '2020 Street W',
            //     'tipe' => 1,
            //     'total_price' => rand(
            //         50000,
            //         200000
            //     )
            // ],

            // [
            //     'order_date' => '2024-12-20',
            //     'customer_name' => 'Victor Teal',
            //     'customer_wa' => '081234567813',
            //     'address' => '2121 Street X',
            //     'tipe' => 2,
            //     'total_price' => rand(
            //         50000,
            //         200000
            //     )
            // ],
            [
                'order_date' => '2025-01-01',
                'customer_name' => 'Uma Aqua',
                'customer_wa' => '081234567812',
                'address' => '2020 Street W',
                'tipe' => 1,
                'total_price' => rand(
                    50000,
                    200000
                )
            ],

            [
                'order_date' => '2025-01-20',
                'customer_name' => 'Victor Teal',
                'customer_wa' => '081234567813',
                'address' => '2121 Street X',
                'tipe' => 2,
                'total_price' => rand(
                    50000,
                    200000
                )
            ],

        ];

        foreach ($orders as $order) {
            \App\Models\Order::create($order);
        }
    }
}

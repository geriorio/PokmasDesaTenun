<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ExpanditureSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $expenditures = [
            [
                'title' => 'Office Supplies',
                'total_price' => rand(
                    50000,
                    300000
                ),
                'exp_date' => '2024-01-10',
            ],

            [
                'title' => 'Internet Bill',
                'total_price' => rand(
                    50000,
                    300000
                ),
                'exp_date' => '2024-01-25',
            ],

            [
                'title' => 'Electricity Bill',
                'total_price' => rand(
                    50000,
                    300000
                ),
                'exp_date' => '2024-02-05',
            ],

            [
                'title' => 'Transportation Costs',
                'total_price' => rand(
                    50000,
                    300000
                ),
                'exp_date' => '2024-02-20',
            ],

            [
                'title' => 'Staff Lunch',
                'total_price' => rand(
                    50000,
                    300000
                ),
                'exp_date' => '2024-03-10',
            ],

            [
                'title' => 'Office Furniture',
                'total_price' => rand(
                    50000,
                    300000
                ),
                'exp_date' => '2024-03-28',
            ],

            [
                'title' => 'Marketing Campaign',
                'total_price' => rand(
                    50000,
                    300000
                ),
                'exp_date' => '2024-04-03',
            ],

            [
                'title' => 'Software Subscription',
                'total_price' => rand(
                    50000,
                    300000
                ),
                'exp_date' => '2024-04-20',
            ],

            [
                'title' => 'Event Sponsorship',
                'total_price' => rand(
                    50000,
                    300000
                ),
                'exp_date' => '2024-05-12',
            ],

            [
                'title' => 'Client Meeting Costs',
                'total_price' => rand(
                    50000,
                    300000
                ),
                'exp_date' => '2024-05-25',
            ],

            [
                'title' => 'Office Renovation',
                'total_price' => rand(
                    50000,
                    300000
                ),
                'exp_date' => '2024-06-05',
            ],

            [
                'title' => 'Company Trip',
                'total_price' => rand(
                    50000,
                    300000
                ),
                'exp_date' => '2024-06-27',
            ],

            [
                'title' => 'Maintenance Services',
                'total_price' => rand(
                    50000,
                    300000
                ),
                'exp_date' => '2024-07-15',
            ],

            [
                'title' => 'Training Costs',
                'total_price' => rand(
                    50000,
                    300000
                ),
                'exp_date' => '2024-07-30',
            ],

            [
                'title' => 'Employee Welfare',
                'total_price' => rand(
                    50000,
                    300000
                ),
                'exp_date' => '2024-08-10',
            ],

            [
                'title' => 'Advertising Costs',
                'total_price' => rand(
                    50000,
                    300000
                ),
                'exp_date' => '2024-08-23',
            ],

            [
                'title' => 'Office Security',
                'total_price' => rand(
                    50000,
                    300000
                ),
                'exp_date' => '2024-09-08',
            ],

            [
                'title' => 'Legal Services',
                'total_price' => rand(
                    50000,
                    300000
                ),
                'exp_date' => '2024-09-25',
            ],

            [
                'title' => 'Printing Costs',
                'total_price' => rand(
                    50000,
                    300000
                ),
                'exp_date' => '2024-10-11',
            ],

            [
                'title' => 'Employee Bonus',
                'total_price' => rand(
                    50000,
                    300000
                ),
                'exp_date' => '2024-10-22',
            ],

            [
                'title' => 'Insurance Premium',
                'total_price' => rand(
                    50000,
                    300000
                ),
                'exp_date' => '2024-11-05',
            ],

            [
                'title' => 'Office Decorations',
                'total_price' => rand(
                    50000,
                    300000
                ),
                'exp_date' => '2024-11-28',
            ],

            [
                'title' => 'Year-End Party',
                'total_price' => rand(
                    50000,
                    300000
                ),
                'exp_date' => '2024-12-05',
            ],

            [
                'title' => 'Charity Donations',
                'total_price' => rand(
                    50000,
                    300000
                ),
                'exp_date' => '2024-12-25',
            ],

        ];

        foreach ($expenditures as $expenditure) {
            \App\Models\Expenditures::create($expenditure);
        }
    }
}

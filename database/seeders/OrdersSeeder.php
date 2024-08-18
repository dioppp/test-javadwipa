<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OrdersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('orders')->insert([
            'order_date' => '2023-01-01',
            'amount' => 200.00,
            'salesman_id' => 1,
            'customer_id' => 1,
        ]);

        DB::table('orders')->insert([
            'order_date' => '2023-01-02',
            'amount' => 250.00,
            'salesman_id' => 2,
            'customer_id' => 1,
        ]);

        DB::table('orders')->insert([
            'order_date' => '2023-01-03',
            'amount' => 150.00,
            'salesman_id' => 3,
            'customer_id' => 2,
        ]);

        DB::table('orders')->insert([
            'order_date' => '2023-01-04',
            'amount' => 300.00,
            'salesman_id' => 4,
            'customer_id' => 3,
        ]);

        DB::table('orders')->insert([
            'order_date' => '2023-01-05',
            'amount' => 400.00,
            'salesman_id' => 1,
            'customer_id' => 2,
        ]);

        DB::table('orders')->insert([
            'order_date' => '2023-01-06',
            'amount' => 350.00,
            'salesman_id' => 2,
            'customer_id' => 3,
        ]);

        DB::table('orders')->insert([
            'order_date' => '2023-01-07',
            'amount' => 500.00,
            'salesman_id' => 3,
            'customer_id' => 1,
        ]);

        DB::table('orders')->insert([
            'order_date' => '2023-01-08',
            'amount' => 200.00,
            'salesman_id' => 4,
            'customer_id' => 3,
        ]);
    }
}

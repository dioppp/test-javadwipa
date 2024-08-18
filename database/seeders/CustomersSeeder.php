<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CustomersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('customers')->insert([
            'customer_name' => 'Alpha Corp',
            'customer_city' => 'New York',
        ]);

        DB::table('customers')->insert([
            'customer_name' => 'Beta Ltd',
            'customer_city' => 'London',
        ]);

        DB::table('customers')->insert([
            'customer_name' => 'Gamma Inc',
            'customer_city' => 'Sydney',
        ]);

        DB::table('customers')->insert([
            'customer_name' => 'Delta Corp',
            'customer_city' => 'Madrid',
        ]);
    }
}

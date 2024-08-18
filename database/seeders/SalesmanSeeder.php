<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class SalesmanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('salesman')->insert([
            'salesman_name' => 'Lauda',
            'salesman_city' => 'New York',
            'commission' => 0.15,
        ]);

        DB::table('salesman')->insert([
            'salesman_name' => 'Miomio',
            'salesman_city' => 'Los Angeles',
            'commission' => 0.12,
        ]);

        DB::table('salesman')->insert([
            'salesman_name' => 'Kamille',
            'salesman_city' => 'Houston',
            'commission' => 0.10,
        ]);

        DB::table('salesman')->insert([
            'salesman_name' => 'Agus',
            'salesman_city' => 'Chicago',
            'commission' => 0.14,
        ]);
    }
}

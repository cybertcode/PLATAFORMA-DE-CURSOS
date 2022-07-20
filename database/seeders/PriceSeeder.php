<?php

namespace Database\Seeders;

use App\Models\admin\Price;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PriceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Price::create(['name' => 'S/. 0.00 Gratis', 'value' => 0]);
        Price::create(['name' => 'S/. 19.99 (nivel 1)', 'value' => 19.99]);
        Price::create(['name' => 'S/. 49.99 (nivel 2)', 'value' => 49.99]);
        Price::create(['name' => 'S/. 99.99 (nivel 3)', 'value' => 99.99]);
    }
}
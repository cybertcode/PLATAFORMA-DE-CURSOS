<?php

namespace Database\Seeders;

use App\Models\admin\Category;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::create(['name' => 'Programación web']);
        Category::create(['name' => 'Diseño web']);
        Category::create(['name' => 'Programación']);
    }
}
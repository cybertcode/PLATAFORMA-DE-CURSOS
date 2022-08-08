<?php

namespace Database\Seeders;

use App\Models\admin\Level;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class LevelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Level::create([
            'name' => 'Nivel básico'
        ]);
        Level::create([
            'name' => 'Nivel intermedio'
        ]);
        Level::create([
            'name' => 'Nivel Avanzado'
        ]);
    }
}
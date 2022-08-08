<?php

namespace Database\Seeders;

use App\Models\admin\Platform;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PlatformSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Platform::create([
            'name' =>'Youtube'
        ]);
        Platform::create([
            'name' =>'Vimeo'
        ]);
    }
}
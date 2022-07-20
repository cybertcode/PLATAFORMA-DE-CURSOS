<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Database\Seeders\UserSeeder;
use Database\Seeders\LevelSeeder;
use Database\Seeders\PriceSeeder;
use Database\Seeders\CourseSeeder;
use Database\Seeders\CategorySeeder;
use Database\Seeders\PlatformSeeder;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        /************************************
         * Eiminamos - Creamos las carpetas *
         ************************************/
        Storage::deleteDirectory('cursos');
        Storage::makeDirectory('cursos');
        /***********************************
         * Llamamos los seeder y factories *
         ***********************************/
        $this->call(UserSeeder::class);
        $this->call(LevelSeeder::class);
        $this->call(CategorySeeder::class);
        $this->call(PriceSeeder::class);
        $this->call(PlatformSeeder::class);
        $this->call(CourseSeeder::class);
    }
}
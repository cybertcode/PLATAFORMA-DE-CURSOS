<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            'name' => 'Administrador',
            'slug' => 'Administrador',
            'email' => 'admin@admin.com',
            'password' => bcrypt('admin123')
        ]);
        $user->assignRole('Administrador');
        //usamos el factory para crear mas datos de prueba
        User::factory(99)->create();
    }
}
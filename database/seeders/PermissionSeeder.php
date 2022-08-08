<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Permission::create([
            'name' => 'Crear cursos'
        ]);
        Permission::create([
            'name' => 'Ver cursos'
        ]);
        Permission::create([
            'name' => 'Actualizar cursos'
        ]);
        Permission::create([
            'name' => 'Eliminar cursos'
        ]);
        Permission::create([
            'name' => 'Ver dashboard'
        ]);
        Permission::create([
            'name' => 'Crear roles'
        ]);
        Permission::create([
            'name' => 'Ver roles'
        ]);
        Permission::create([
            'name' => 'Actualizar roles'
        ]);
        Permission::create([
            'name' => 'Eliminar roles'
        ]);
        Permission::create([
            'name' => 'Ver usuarios'
        ]);
        Permission::create([
            'name' => 'Actualizar usuarios'
        ]);
    }
}
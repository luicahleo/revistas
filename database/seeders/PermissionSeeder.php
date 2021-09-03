<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

//para generar los permisos, importamos el modelo Permission
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Permisos
        Permission::create([
            'name' => 'Registrar revistas',
        ]);
        Permission::create([
            'name' => 'Leer revistas',
        ]);
        Permission::create([
            'name' => 'Actualizar revistas',
        ]);
        Permission::create([
            'name' => 'Eliminar revistas',
        ]);
        Permission::create([
            'name' => 'Ver dashboard',
        ]);

        //ahora para Role
        
        Permission::create([
            'name' => 'Crear role',
        ]);
        Permission::create([
            'name' => 'Listar role',
        ]);
        Permission::create([
            'name' => 'Editar role',
        ]);
        Permission::create([
            'name' => 'Eliminar role',
        ]);

        //para usuarios
        Permission::create([
            'name' => 'Leer usuarios',
        ]);
        Permission::create([
            'name' => 'Editar usuarios',
        ]);
    }
}

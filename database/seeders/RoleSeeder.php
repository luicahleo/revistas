<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

//importamos model Role
use Spatie\Permission\Models\Role;



class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role = Role::create(['name' => 'Admin']);

        $role->permissions()->attach([1,2,3,4,5,6,7,8,9,10,11]);
        

        $role = Role::create(['name' => 'Hemeroteca']);
        //larave permissions nos permite de esta manera
        $role->syncPermissions(['Registrar revistas', 'Leer revistas', 'Actualizar revistas', 'Eliminar revistas',]);


    }
}

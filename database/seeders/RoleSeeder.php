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
        Role::create([
            'name' => 'Admin'
        ]);
        Role::create([
            'name' => 'Hemeroteca'
        ]);
    }
}

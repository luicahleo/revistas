<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

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
            'name' => 'Biblioteca Etsi',
            'email' => 'bibetsi@us.es',
            'password' => bcrypt('123456789')
        ]);
        //laravel permission nos permite asignarle mediante nombre
        $user->assignRole('Admin');

        $user = User::create([
            'name' => 'Hemeroteca',
            'email' => 'hemeroteca@us.es',
            'password' => bcrypt('123456789')
        ]);
        //laravel permission nos permite asignarle mediante nombre
        $user->assignRole('Hemeroteca');

        User::factory(99)->create();
    }
}

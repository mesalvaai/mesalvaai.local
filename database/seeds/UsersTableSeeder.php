<?php

use Illuminate\Database\Seeder;
use Caffeinated\Shinobi\Models\Role;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Users aleatorios
        factory(App\User::class, 3)->create();

        Role::create([
        	'name' => 'Admin',
        	'slug' => 'admin',
        	'special' => 'all-access'
        ]);

        Role::create([
        	'name' => 'Financiamento Colectivo',
        	'slug' => 'role_fc',
        	'description' => 'Rol só para as pessoas do financiamento colectivo'
        ]);
        
    }
}

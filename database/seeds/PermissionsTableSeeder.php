<?php

use Illuminate\Database\Seeder;
use Caffeinated\Shinobi\Models\Permission;

class PermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	//Users
        Permission::create([
        	'name' => 'Navegar usuarios',
        	'slug' => 'users.index',
        	'description' => 'Lista e navega todos os usuarios do sistema',
        ]);

        Permission::create([
        	'name' => 'Ver detalhes do usuario',
        	'slug' => 'users.show',
        	'description' => 'Ver em detalhe cada usuario do sistema',
        ]);

        Permission::create([
        	'name' => 'Alterar usuarios',
        	'slug' => 'users.edit',
        	'description' => 'Editar qualquer dado de um usuario do sistema',
        ]);

        Permission::create([
        	'name' => 'Excluir usuarios',
        	'slug' => 'users.destroy',
        	'description' => 'Excluir qualquer usuario do sistema',
        ]);

        //Roles
        Permission::create([
        	'name' => 'Navegar roles',
        	'slug' => 'roles.index',
        	'description' => 'Lista e navega todos os roles do sistema',
        ]);

        Permission::create([
        	'name' => 'Ver detalhes do roles',
        	'slug' => 'roles.show',
        	'description' => 'Ver em detalhe cada rol do sistema',
        ]);

        Permission::create([
        	'name' => 'Alterar roles',
        	'slug' => 'roles.create',
        	'description' => 'Editar qualquer dado de um rol do sistema',
        ]);

        Permission::create([
        	'name' => 'Alterar roles',
        	'slug' => 'roles.edit',
        	'description' => 'Editar qualquer dado de um rol do sistema',
        ]);

        Permission::create([
        	'name' => 'Excluir roles',
        	'slug' => 'roles.destroy',
        	'description' => 'Excluir qualquer rol do sistema',
        ]);

        //Categories
        Permission::create([
        	'name' => 'Navegar categories',
        	'slug' => 'categories.index',
        	'description' => 'Lista e navega todos os categories do sistema',
        ]);

        Permission::create([
        	'name' => 'Ver detalhes do categories',
        	'slug' => 'categories.show',
        	'description' => 'Ver em detalhe cada produto do sistema',
        ]);

        Permission::create([
        	'name' => 'Alterar categories',
        	'slug' => 'categories.create',
        	'description' => 'Editar qualquer dado de um produto do sistema',
        ]);

        Permission::create([
        	'name' => 'Alterar categories',
        	'slug' => 'categories.edit',
        	'description' => 'Editar qualquer dado de um produto do sistema',
        ]);

        Permission::create([
        	'name' => 'Excluir categories',
        	'slug' => 'categories.destroy',
        	'description' => 'Excluir qualquer produto do sistema',
        ]);
    }
}

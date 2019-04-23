<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(AreasTableSeed::class);
        $this->call(PermissionsTableSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(CitiesTableSeeder::class);
        $this->call(CoursesTableSeeder::class);
        $this->call(CategoriesTableSeed::class);
        //$this->call(AreasTableSeed::class);
        //$this->call(SomethingElse::class);
    }
}

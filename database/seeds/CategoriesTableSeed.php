<?php

use Illuminate\Database\Seeder;

use App\Category;

class CategoriesTableSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\Category::create([
            'name' => 'Ensino básico',
            'description' => 'Ensino básico',
            'status' => '1'
        ]);
        App\Category::create([
            'name' => 'Graduação',
            'description' => 'Graduação',
            'status' => '1'
        ]);
        App\Category::create([
            'name' => 'Pós-graduação',
            'description' => 'Pós-graduação',
            'status' => '1'
        ]);
        App\Category::create([
            'name' => 'Mesadinha',
            'description' => 'Mesadinha',
            'status' => '1'
        ]);
        App\Category::create([
            'name' => 'Intercâmbio',
            'description' => 'Intercâmbio',
            'status' => '1'
        ]);
    }
}

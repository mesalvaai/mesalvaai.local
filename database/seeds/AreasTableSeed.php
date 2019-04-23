<?php

use Illuminate\Database\Seeder;
use App\Area;

class AreasTableSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\Area::create([
            'name' => 'Engenharia e arquitetura',
            'slug' => 'engenharia-e-arquitetura',
            'description' => 'Faculdade de engenharia'
        ]);
    }
}

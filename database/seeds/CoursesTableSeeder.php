<?php

use Illuminate\Database\Seeder;

class CoursesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\Period::create([
            'slug' => '1-periodo', 
            'name' => '1 Periodo'
        ]);

        App\Period::create([
            'slug' => '2-periodo', 
            'name' => '2 Periodo'
        ]);
    }
}

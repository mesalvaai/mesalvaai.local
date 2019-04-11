<?php

use Illuminate\Database\Seeder;

class CitiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\Country::create([
            'name' => 'Brazil', 
            'slug' => 'br',
            'status' => 1
        ]);

        App\State::create([
            'name' => 'Bahia', 
            'sigla' => 'BA',
            'slug' => 'ba',
            'status' => 1,
            'country_id' => 1
        ]);

        App\City::create([
            'name' => 'Cachoeira', 
            'slug' => 'cachoeira',
            'status' => 1,
            'state_id' => 1
        ]);
    }
}

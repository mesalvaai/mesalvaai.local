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
            'status' => 1,
            'id' => 3469034
        ]);

        error_log('Carregando estados via http...');

        $getStates = $this->httpGetRequest("http://servicodados.ibge.gov.br/api/v1/localidades/estados"); 
        foreach ($getStates as $keyState => $state) {

            App\State::create(
            [
                "id" => $state->id,
                "name" => $state->nome,
                "sigla" => $state->sigla,
                "slug" => strtolower($state->sigla),
                "status" => 1,
                "country_id" => 3469034
            ]);
            error_log('Adicionando estado '.$state->nome);

            $getCities = $this->httpGetRequest("https://servicodados.ibge.gov.br/api/v1/localidades/estados/{$state->id}/municipios");
            foreach ($getCities as $keyCity => $valueCity) {
                App\City::create([
                    'name' => $valueCity->nome, 
                    'slug' => $valueCity->id,
                    'status' => 1,
                    'state_id' => $state->id,
                    'id'=> $valueCity->id
                ]);
                error_log('Adicionando cidade '.$valueCity->nome);
            }
           
        }

    }

    function httpGetRequest($url){
        $json = file_get_contents($url);
        return json_decode(gzdecode($json));
    }
}

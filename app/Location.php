<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
	// public static function getPaisesThisContinent($idContinente){

	// 	$url ="http://api.geonames.org/childrenJSON?geonameId={$idContinente}&username=wallas&lang=pt";

	// 	$json = file_get_contents($url);

	// 	$data = json_decode($json);

	// 	$countries  = array();

	// 	foreach ($data->geonames as $key => $value) {

	// 		$countries [$value->geonameId] = $value->name;

	// 	}

	// 	return $countries ;    
	// }
	public static function getPaises(){
		
//Todos Os continnetes por ID

		$idAF = 6255146;
		$idAS = 6255147;
		$idUE = 6255148;
		$idNA = 6255149;
		$idOC = 6255151;
		$idSA = 6255150;
		$idAN = 6255152;

		$arrayContinentes = array($idAF, $idAS, $idUE, $idNA, $idOC, $idSA, $idAN);

		$countries = array();

		foreach($arrayContinentes as $value) {

			$url ="http://api.geonames.org/childrenJSON?geonameId={$value}&username=wallas&lang=pt";

			$json = file_get_contents($url);

			$data = json_decode($json);

			foreach ($data->geonames as $key => $value) {

				$countries[$value->geonameId] = $value->name;

			}

		}
		return $countries;    
	}

	public static function getEstados($idPais){

		$states = array();

//ID do Brasil == 3469034

		if($idPais == 3469034)
		{
			try {

				$url ="https://servicodados.ibge.gov.br/api/v1/localidades/estados";

			// $opts = array('http' => array('header' => "User-Agent:MyAgent/1.0\r\n"));
			// $context = stream_context_create($opts);
			// $header = file_get_contents($url, FALSE, $context);
			//dd($header);

				$json = file_get_contents($url);

				$data = json_decode($json);

				foreach ($data as $key => $value) {

					$states[$value->id] = $value->nome;

				}
			}
			catch(Exception $e)
			{
				$url ="http://api.geonames.org/childrenJSON?geonameId={$idPais}&username=wallas&lang=pt";

				$json = file_get_contents($url);

				$data = json_decode($json);

				foreach ($data->geonames as $key => $value) {

					$states[$value->geonameId] = $value->name;

				}
			}
		}
		else
		{
			$url ="http://api.geonames.org/childrenJSON?geonameId={$idPais}&username=wallas&lang=pt";

			$json = file_get_contents($url);

			$data = json_decode($json);

			foreach ($data->geonames as $key => $value) {

				$states[$value->geonameId] = $value->name;

			}

		}  

		return $states;  
	}

	public static function getCidades($idPais, $idEstado){

		$cities = array();

		if($idPais == 3469034){

			try {

				$url ="http://servicodados.ibge.gov.br/api/v1/localidades/estados/{$idEstado}/municipios";

				$json = file_get_contents($url);
				$data = json_decode($json);

				foreach ($data as $key => $value) {

					$cities[$value->id] = $value->nome;

				}
			}
			catch(Exception $e)
			{
				$url ="http://api.geonames.org/childrenJSON?geonameId={$idEstado}&username=wallas&lang=pt";

				$json = file_get_contents($url);
				$data = json_decode($json);

				foreach ($data->geonames as $key => $value) {

					$cities[$value->geonameId] = $value->name;

				}
			}
		}
		else
		{
			$url ="http://api.geonames.org/childrenJSON?geonameId={$idEstado}&username=wallas&lang=pt";

			$json = file_get_contents($url);
			$data = json_decode($json);

			foreach ($data->geonames as $key => $value) {

				$cities[$value->geonameId] = $value->name;

			}
		} 

		return $cities; 
	}

	public static function getLocationInfo($idPais, $idEstado, $idCidade){

		$countryName;
		$stateName;
		$cityName;

		if($idPais == 3469034)
		{
			$url ="http://servicodados.ibge.gov.br/api/v1/localidades/estados/{$idEstado}/municipios";

			$json = file_get_contents($url);
			$data = json_decode($json);

			$stateName = $data[0]->microrregiao->mesorregiao->UF->nome;

			foreach ($data as $value) {

				if($value->id == $idCidade){

					$cityName = $value->nome;

					break;
				}
			}

			$countryName = "Brasil";
		}
		else
		{

			$url ="http://api.geonames.org/childrenJSON?geonameId={$idEstado}&username=wallas&lang=pt";

			$json = file_get_contents($url);
			$data = json_decode($json);

			$stateName = $data->geonames[0]->adminName1;


			foreach ($data->geonames as $value) {

				if($value->geonameId == $idCidade)
				{
					$cityName = $value->name;

					break;
				}
			}
			$countryName = $data->geonames[0]->countryName;
		}  

		return compact('countryName','stateName', 'cityName');  
	}
	
}
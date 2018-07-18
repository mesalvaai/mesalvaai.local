<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Geonames extends Model
{

	public static function getEstados($idPais){
		
		$url ="http://api.geonames.org/childrenJSON?geonameId={$idPais}&username=wallas&lang=pt";

		$json = file_get_contents($url);

		$data = json_decode($json);

		$arrayEstados = array( );

		foreach ($data->geonames as $key => $value) {

			$arrayEstados[$value->geonameId] = $value->name;

		}

		return $arrayEstados;    
	}

	public static function getCidades($idEstado){
   //3392213 PI

		$url ="http://api.geonames.org/childrenJSON?geonameId={$idEstado}&username=wallas&lang=pt";

		$json = file_get_contents($url);
		$data = json_decode($json);
		$arrayCidades = array();

		foreach ($data->geonames as $key => $value) {

			$arrayCidades[$value->geonameId] = $value->name;

		}

		return $arrayCidades;    
	}

	public static function getEstadoCityNames($idEstado, $idCidade){
   //3392213 PI

		$url ="http://api.geonames.org/childrenJSON?geonameId={$idEstado}&username=wallas&lang=pt";

		$json = file_get_contents($url);
		$data = json_decode($json);

		$stateName = $data->geonames[0]->adminName1;
		$cityName;

		foreach ($data->geonames as $value) {

			if($value->geonameId == $idCidade)
			{
				$cityName = $value->name;
			}
		}
		return compact('stateName', 'cityName');    
	}
	public static function getCidadeName($idEstado){
   //3392213 PI

		$url ="http://api.geonames.org/childrenJSON?geonameId={$idEstado}&username=wallas&lang=pt";

		$json = file_get_contents($url);
		$data = json_decode($json);

		dd($data);

		$stateName = $data->geonames[0]->adminName1;

		return $stateName;    
	}
}
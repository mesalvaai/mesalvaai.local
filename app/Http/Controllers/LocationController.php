<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Location;

class LocationController extends Controller
{
	public function getEstados($idPais)
	{
		$states = Location::getEstados($idPais);

		return $states;
	}

	public function getCidades($idPais, $idEstado)
	{

		$cities = Location::getCidades($idPais, $idEstado);

		return $cities;
	}
}

<?php

namespace App\Http\Controllers\Handbag;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Location;
use App\Course;
use App\Level;
use App\Turn;
use App\Institutions;
use App\Modality;

class AdminController extends Controller
{
	public function index()
	{

		  //Add ID do pais do usuário
        //Brasil id = 3469034

		$idPais = 3469034;
		$states = Location::getEstados($idPais);
		$courses = Course::paginate()->pluck('name', 'id');

		$levels = Level::paginate()->pluck('name', 'id');

		// dd($states);
		return view('bags.index', compact('states', 'courses', 'levels'));
	}

	public function showCourse(Request $request)
	{

		$nameCourse = $request->input('name_course');
		$nameLevel = $request->input('name_level');
		$nameType = $request->input('name_type');
		$nameModality = $request->input('name_modality');
		$nameTurn = $request->input('name_turn');
		$nameInstitution = $request->input('name_institution');
		$monthlyPayment = $request->input('monthly_payment');
		$discount = $request->input('discount');
		$duration = $request->input('duration');
		$priceAtual = $request->input('price_atual');


		return view('bags.curso', compact('nameCourse', 'nameLevel', 'nameType', 'nameModality', 'nameTurn', 'nameInstitution', 'monthlyPayment', 'discount','duration', 'priceAtual'));
	}

	public function showResult(Request $request)
	{


		$idPais = 3469034;
		$states = Location::getEstados($idPais);

		$state_id = $request->input('state_id');

		$cities = Location::getCidades($idPais, $state_id);

		$level_id = $request->input('level_id');

		$course_id = $request->input('course_id');

		$dataForm = $request->except('_token');

		$courses = \DB::table('vw_info_bags')
		->where(function($query) use ($dataForm){

			if(isset($dataForm['state_id']))
				$query->where('state_id_institution', '=', $dataForm['state_id']);


			if(isset($dataForm['level_id']))
				$query->where('id_level', '=', $dataForm['level_id']);

			if(isset($dataForm['course_id']))
				$query->where('id_course', '=', $dataForm['course_id']);


			if(!(isset($dataForm['presential']) && isset($dataForm['distance'])))
			{
				if(isset($dataForm['presential']))
					$query->where('name_modality', '=', 'presencial');


				if(isset($dataForm['distance']))
					$query->where('name_modality', '=', 'EAD');
			}
		})
		->paginate(1);
		// dd($courses);

		return view('bags.resultado', compact('courses', 'states', 'state_id', 'cities', 'level_id','course_id', 'dataForm'));
	}

	public function searchCourses(Request $request)
	{


		$dataForm = $request->except('_token');

		$courses = \DB::table('vw_info_bags')
		->where(function($query) use ($dataForm){

			if(isset($dataForm['state_id']))
				$query->where('state_id_institution', '=', $dataForm['state_id']);

			if(isset($dataForm['city_id']))
				$query->where('city_id_institution', '=', $dataForm['city_id']);

			if(isset($dataForm['level_id']))
				$query->where('id_level', '=', $dataForm['level_id']);

			if(isset($dataForm['course_id']))
				$query->where('id_course', '=', $dataForm['course_id']);

			if(isset($dataForm['institution_id']))
				$query->where('id_institution', '=', $dataForm['institution_id']);


			if(isset($dataForm['modality_id']))
				$query->where('id_modality', '=', $dataForm['modality_id']);

			if(isset($dataForm['turn_id']))
				$query->where('id_turn', '=', $dataForm['turn_id']);

		})
		// ->toSql();
		->paginate(1);

		// dd($courses);

		$idPais = 3469034;

		$states = Location::getEstados($idPais);

		$state_id = $request->input('state_id');

		$cities = Location::getCidades($idPais, $state_id);


		$level_id = $request->input('level_id');

		// $cursos= Course::get()->pluck('name', 'id');

		$course_id = $request->input('course_id');

		$city_id = $request->input('city_id');

		$institution_id = $request->input('institution_id');
		$modality_id = $request->input('modality_id');
		$turn_id = $request->input('turn_id');
		// dd($course_id);

		return view('bags.resultado', compact('courses', 'states', 'state_id', 'cities', 'level_id', 'course_id', 'city_id', 'institution_id', 'modality_id', 'turn_id', 'dataForm'));
	}		

	public function preencheForm()
	{

		$levels = Level::get()->pluck('name', 'id')->toArray();
		$cursos= Course::get()->pluck('name', 'id')->toArray();

		$institutions = Institutions::get()->pluck('name', 'id')->toArray();

		$modalities = Modality::get()->pluck('name', 'id')->toArray();
		$turns = Turn::get()->pluck('name', 'id')->toArray();

		return [$levels, $cursos, $institutions, $modalities, $turns];	


	}

}
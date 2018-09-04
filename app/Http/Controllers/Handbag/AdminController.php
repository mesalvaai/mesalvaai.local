<?php

namespace App\Http\Controllers\Handbag;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Location;
use App\Course;


class AdminController extends Controller
{
	public function index()
	{

		  //Add ID do pais do usuário
        //Brasil id = 3469034

		$idPais = 3469034;
		$states = Location::getEstados($idPais);
		$courses = Course::paginate()->pluck('name', 'id');

		// dd($states);
		return view('bags.index', compact('states', 'courses'));
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

// 		SELECT c.name,t.name,l.name FROM mm2.courses c 
// inner join course_turn ct on(c.id = ct.course_id)
// inner join turns t on(ct.turn_id = t.id)
// inner join levels l on (c.level_id = l.id)
//  where c.id = 1 ;

 //  select i.name,c.name,m.name  from mm2.institutions i
 // inner join institution_course ic on (i.id = ic.institution_id) 
 // inner join courses c on (ic.course_id = c.id)
 // inner join course_modality cm on (cm.course_id = c.id)
 // inner join modalities m on (m.id = cm.modality_id)
 //  ;

		if($request->input('presential') == 1 && $request->input('distance') != 1){
//apenas presencial

			// inner join costs cc on (cc.course_id = c.id);


			$courses = \DB::table('institutions')
			->join('institution_course', 'institutions.id', '=', 'institution_course.institution_id')
			->join('courses', 'courses.id', '=', 'institution_course.course_id')
			->join('course_turn', 'courses.id', '=', 'course_turn.course_id')
			->join('turns', 'turns.id', '=', 'course_turn.turn_id')
			->join('levels', 'levels.id', '=', 'courses.level_id')
			->join('course_modality', 'courses.id', '=', 'course_modality.course_id')
			->join('modalities', 'modalities.id', '=', 'course_modality.modality_id')
			->join('course_type', 'course_type.course_id', '=', 'courses.id')
			->join('types', 'course_type.type_id', '=', 'types.id')
			->join('costs', 'costs.course_id', '=', 'courses.id')
			->select('courses.id', 'costs.monthly_payment', 'costs.discount', 'courses.duration', 'courses.name as name_course', 'turns.name as name_turn', 'levels.name as name_level', 'institutions.name as name_institution', 'modalities.name as name_modality', 'types.name as name_type' )
			->where('institutions.state_id', '=', $request->input('state_id'))
			->where('institutions.city_id', '=', $request->input('city_id'))
			->where('modalities.name', '=','presencial')
			->where('courses.id', '=', $request->input('course_id'))
			->paginate(30);

		} elseif ($request->input('distance') == 1 && $request->input('presential') != 1) {

			$courses = \DB::table('institutions')
			->join('institution_course', 'institutions.id', '=', 'institution_course.institution_id')
			->join('courses', 'courses.id', '=', 'institution_course.course_id')
			->join('course_turn', 'courses.id', '=', 'course_turn.course_id')
			->join('turns', 'turns.id', '=', 'course_turn.turn_id')
			->join('levels', 'levels.id', '=', 'courses.level_id')
			->join('course_modality', 'courses.id', '=', 'course_modality.course_id')
			->join('modalities', 'modalities.id', '=', 'course_modality.modality_id')
			->join('course_type', 'course_type.course_id', '=', 'courses.id')
			->join('types', 'course_type.type_id', '=', 'types.id')
			->join('costs', 'costs.course_id', '=', 'courses.id')
			->select('courses.id', 'costs.monthly_payment', 'costs.discount', 'courses.duration', 'courses.name as name_course', 'turns.name as name_turn', 'levels.name as name_level', 'institutions.name as name_institution', 'modalities.name as name_modality', 'types.name as name_type' )
			->where('institutions.state_id', '=', $request->input('state_id'))
			->where('institutions.city_id', '=', $request->input('city_id'))
			->where('modalities.name', '=','EAD')
			->where('courses.id', '=', $request->input('course_id'))
			->paginate(30);

		}
		else{
			$courses = \DB::table('institutions')
			->join('institution_course', 'institutions.id', '=', 'institution_course.institution_id')
			->join('courses', 'courses.id', '=', 'institution_course.course_id')
			->join('course_turn', 'courses.id', '=', 'course_turn.course_id')
			->join('turns', 'turns.id', '=', 'course_turn.turn_id')
			->join('levels', 'levels.id', '=', 'courses.level_id')
			->join('course_modality', 'courses.id', '=', 'course_modality.course_id')
			->join('modalities', 'modalities.id', '=', 'course_modality.modality_id')
			->join('course_type', 'course_type.course_id', '=', 'courses.id')
			->join('types', 'course_type.type_id', '=', 'types.id')
			->join('costs', 'costs.course_id', '=', 'courses.id')
			->select('courses.id', 'costs.monthly_payment', 'costs.discount', 'courses.duration', 'courses.name as name_course', 'turns.name as name_turn', 'levels.name as name_level', 'institutions.name as name_institution', 'modalities.name as name_modality', 'types.name as name_type' )
			->where('institutions.state_id', '=', $request->input('state_id'))
			->where('institutions.city_id', '=', $request->input('city_id'))
			->where('courses.id', '=', $request->input('course_id'))
			->paginate(30);

         //where cidade e estado a distância ou presencial

		}
		return view('bags.resultado', compact('courses'));
	}
}

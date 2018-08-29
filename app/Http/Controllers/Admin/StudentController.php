<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\StudentFormRequest;
use App\Student;
use App\State;
use App\City;
use App\Location;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
     $students = Student::paginate();

        // Repassando para a view
     return view('admins.students.index', compact('students'));

   }

   // public function getPaises()
   // {
   //   $countries = Location::getPaisesRestantes();

   //   return $countries;
   // }


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

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {


      $countries = Location::getPaises();

   //Add ID do pais do usuário
   //Brasil id = 3469034
      $idPais = 3469034;

      $states = Location::getEstados($idPais);

      return view('admins.students.create', compact('states','countries', 'idPais'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Student $student)
    {
      $messages = [
       'required' => 'O campo ":attribute" é obrigatório!',
       'email.unique' => 'Já existe estudante cadastrado com este email!',
       'cpf.unique' => 'Já existe estudante cadastrado com este CPF!',
       'numeric' => 'O campo ":attribute" deve ser um número!',
       'min' => 'O campo ":attribute" deve ter no mínimo :min caracteres!',
       'max' => 'O campo ":attribute" deve ter no maximo :max caracteres!',
       'type.required' => 'O campo "tipo" é obrigatório!',
       'unique' => 'Este ":attribute" já se encontra cadastrado no sistema!',
        'cpf'=> 'Esse cpf é inválido!',
       
     ];

     $validator = \Validator::make($request->all(), [
      'email' => [
        'bail',
        'required',
        'max:255',
        Rule::unique('students')->ignore($student->id),
      ], 
      'cpf' => [
        'bail',
        'required',
         'cpf',  
        'max:14',
        Rule::unique('students')->ignore($student->id),
      ], 
      'name'    =>'required|min:3|max:100',           
      'data_of_birth' => 'required|date',
      'phone'   =>'required',
      'cep'     =>'required',
      'state_id'   =>'required',
      'city_id' =>'required',
      'street'  =>'required',
      'number'  =>'required',
      'neighborhood' =>'required',
      'complement'   =>'required',
      'status'  =>'required'
    ], $messages);

     if ($validator->fails()) {

      return redirect()->back()
      ->withErrors($validator)
      ->withInput();

    }

      $student = Student::create($request->all());

      return redirect()->route('students.edit', $student->id)->with('status', 'Estudante cadastrado com sucesso');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function show(Student $student)
    {

      $returns =  Location::getLocationInfo($student->country_id, $student->state_id, $student->city_id);

      $countryName =  $returns["countryName"];
      $stateName =  $returns["stateName"];
      $cityName =  $returns["cityName"];


      return view('admins.students.show', compact('student', 'countryName','stateName', 'cityName'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function edit(Student $student)
    {
      //Add ID do pais do usuário
      //Brasil id = 3469034
      $idPais = 3469034;
      $countries = Location::getPaises();

      if ($student->country_id == null) {
        $countries = Location::getPaises();
        //Add ID do pais do usuário
        //Brasil id = 3469034
        $idPais = 3469034;
        $states = Location::getEstados($idPais);
        $idEstado = 29; //Bahia
        $cities = Location::getCidades($idPais, $idEstado);
      } else {
        $states = Location::getEstados($student->country_id);
        $cities = Location::getCidades($student->country_id, $student->state_id);
      }

      return view('admins.students.edit', compact('student', 'countries', 'states', 'cities', 'idPais'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Student $student)
    {

       // $validated = $request->validated();

      $messages = [
       'required' => 'O campo ":attribute" é obrigatório!',
       'email.unique' => 'Já existe estudante cadastrado com este email!',
       'cpf.unique' => 'Já existe estudante cadastrado com este CPF!',
       'numeric' => 'O campo ":attribute" deve ser um número!',
       'min' => 'O campo ":attribute" deve ter no mínimo :min caracteres!',
       'max' => 'O campo ":attribute" deve ter no maximo :max caracteres!',
       'type.required' => 'O campo "tipo" é obrigatório!',
       'unique' => 'Este ":attribute" já se encontra cadastrado no sistema!',
        'cpf'=> 'Esse cpf é inválido!',
       
     ];

     $validator = \Validator::make($request->all(), [
      'email' => [
        'bail',
        'required',
        'max:255',
        Rule::unique('students')->ignore($student->id),
      ], 
      'cpf' => [ 
        'bail',
        'required',
        'cpf',
        'max:14',
        Rule::unique('students')->ignore($student->id),
      ], 
      'name'    =>'required|min:3|max:100',           
      'data_of_birth' => 'required|date',
      'phone'   =>'required',
      'cep'     =>'required',
      'state_id'   =>'required',
      'city_id' =>'required',
      'street'  =>'required',
      'number'  =>'required',
      'neighborhood' =>'required',
      'complement'   =>'required',
      'status'  =>'required'
    ], $messages);

     if ($validator->fails()) {

      return redirect()->back()
      ->withErrors($validator)
      ->withInput();

    }

    $student->update($request->all());

    return redirect()->route('students.edit', $student->id)->with('status', 'Atualizado alterado com sucesso');
  }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function destroy(Student $student)
    {
      $student->delete();

      return back()->with('status', 'Esse cadastro foi excluido');
    }
  }

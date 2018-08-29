<?php

namespace App\Http\Controllers\Admin;

use App\Cost;
use App\Course;
use App\Period;
use App\Level;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $costs = Cost::paginate();

        // Repassando para a view
        return view('admins.costs.index', compact('costs'));
    }
    
    public function getCursos()
    {
      $courses = Course::getCursos();
      return $courses;
    }

    public function getNivel()
    {

    $levels = Level::getNivel();
      return $levels;
    }
    
    public function getPeriodo()
    {

    $periods = Period::getPeriodo();
      return $periods;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $courses = Course::getCursos();
        
        $periods = Period::getPeriodo();
        $levels = Level::getNivel();
        return view('admins.costs.create', compact('courses','periods', 'levels'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         $messages = [
      'required' => 'Este campo é obrigatório!',
      'max' => 'Valor máximo de caracteres excedido!',
     
    ];
    $validator = \Validator::make($request->all(), [
      'monthly_payment', 'dicount' ,'scholarship','economy', 'vacancy' => 'required',
      
      'status' => 'bail|required|max:1',
    ], $messages);

    if ($validator->fails()){
      return redirect()->back()
      ->withErrors($validator)
      ->withInput();  
    }


      $costs = Cost::create($request->all());

      return redirect()->route('costs.edit', $costs->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Cost  $costs
     * @return \Illuminate\Http\Response
     */
    public function show(Cost $costs)
    {
        return view('admins.costs.show', compact('costs'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Cost  $costs
     * @return \Illuminate\Http\Response
     */
    public function edit(Cost $costs)
    {
        return view('admins.costs.edit', compact('costs'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Cost  $costs
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Cost $costs)
    {
         $messages = [
      'required' => 'Este campo é obrigatório!',
      'max' => 'Valor máximo de caracteres excedido!',
     
    ];
    $validator = \Validator::make($request->all(), [
      'monthly_payment', 'dicount' ,'scholarship','economy', 'vacancy' => 'required',
      
      'status' => 'bail|required|max:1',
    ], $messages);

    if ($validator->fails()){
      return redirect()->back()
      ->withErrors($validator)
      ->withInput();  
    }
    
    $costs->update($request->all());

    return redirect()->route('costs.edit', $costs->id)->with('status', 'Atualizado com sucesso');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Cost  $costs
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cost $costs)
    {
      $costs->delete();

      return back()->with('status', 'Essa cota foi excluida');
    }
}

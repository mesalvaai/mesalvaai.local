<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\LevelFormRequest;
use App\Level;
use App\Location;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LevelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
     $levels = Level::paginate();

        // Repassando para a view
     return view('admins.levels.index', compact('levels'));

   }

  
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
     
      return view('admins.levels.create', compact('levels'));

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
      'name.unique' => 'Já existe um level com este título!',
      'max' => 'Valor máximo de caracteres excedido!',
     
    ];


    $validator = \Validator::make($request->all(), [
      'name' => 'required|unique:levels|max:255',
      
    ], $messages);

    if ($validator->fails()){
      return redirect()->back()
      ->withErrors($validator)
      ->withInput();  
    }

      $levels = Level::create($request->all());

      return redirect()->route('levels.edit', $levels->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Level  $levels
     * @return \Illuminate\Http\Response
     */
    public function show(Level $level)
    {
      return view('admins.levels.show', compact('level'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Level  $level
     * @return \Illuminate\Http\Response
     */
    public function edit(Level $level)
    {
        
      return view('admins.levels.edit', compact('level'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Level  $level
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Level $level)
    {
         $messages = [
      'required' => 'Este campo é obrigatório!',
      'name.unique' => 'Já existe um level com este título!',
      'max' => 'Valor máximo de caracteres excedido!',
     
    ];


    $validator = \Validator::make($request->all(), [
      'name' => 'required|unique:levels|max:255',
      
    ], $messages);

    if ($validator->fails()){
      return redirect()->back()
      ->withErrors($validator)
      ->withInput();  
    }

    
    $level->update($request->all());

    return redirect()->route('levels.edit', $level->id)->with('status', 'Atualizado com sucesso');
  }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Level  $level
     * @return \Illuminate\Http\Response
     */
    public function destroy(Level $level)
    {
      $level->delete();

      return back()->with('status', 'Esse level foi excluido');
    }
  }

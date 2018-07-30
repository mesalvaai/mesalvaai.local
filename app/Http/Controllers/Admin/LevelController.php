<?php

namespace App\Http\Controllers\Admin;

use App\Turn;
use App\Location;
use App\Http\Controllers\Controller;

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
    public function store(FormRequest $request)
    {
      $validated = $request->validated();

      $level = Level::create($request->all());

      return redirect()->route('levels.edit', $level->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Level  $level
     * @return \Illuminate\Http\Response
     */
    public function show(Level $level)
    {
      return view('admins.levels.show', compact('levels'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Level  $level
     * @return \Illuminate\Http\Response
     */
    public function edit(Level $level)
    {
      return view('admins.levels.edit', compact('levels'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Level  $level
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
    
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

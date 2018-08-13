<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\TurnFormRequest;
use App\Turn;
use App\Location;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TurnController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
     $turns = Turn::paginate();

        // Repassando para a view
     return view('admins.turns.index', compact('turns'));

   }

  
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

      return view('admins.turns.create', compact('turns'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TurnFormRequest $request)
    {
      $validated = $request->validated();

      $turn = Turn::create($request->all());

      return redirect()->route('turns.edit', $turn->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Turn  $turn
     * @return \Illuminate\Http\Response
     */
    public function show(Turn $turn)
    {
      return view('admins.turns.show', compact('turn'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Turn  $turn
     * @return \Illuminate\Http\Response
     */
    public function edit(Turn $turn)
    {
      return view('admins.turns.edit', compact('turn'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Turn  $turn
     * @return \Illuminate\Http\Response
     */
    public function update(TurnFormRequest $request, Request $turn )
    {
    
     
    
    $turn->update($request->all());

    return redirect()->route('turns.edit', $turn->id)->with('status', 'Atualizado com sucesso');
  }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Turn  $turn
     * @return \Illuminate\Http\Response
     */
    public function destroy(Turn $turn)
    {
      $turn->delete();

      return back()->with('status', 'Esse turn foi excluido');
    }
  }

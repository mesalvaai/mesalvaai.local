<?php

namespace App\Http\Controllers\Admin;

use App\City;
use App\State;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cities = City::paginate();
        return view('admins.cities.index', compact('cities'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       $states = State::paginate();

       $selectStates = array();

       $selectStates[0] = '-- Selecione um Estado --';

       foreach($states as $State)
       {
        $selectStates[$State->id] = $State->name;

    }
    return view('admins.cities.create',compact('selectStates'));
}

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $city = City::create($request->all());

        return redirect()->route('cities.edit', $city->id)
        ->with('status', 'Cidade cadastrada com sucesso');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\City  $city
     * @return \Illuminate\Http\Response
     */
    public function show(City $city)
    {
 $states = \DB::table('cities')
        ->join('states', 'states.id', '=', 'cities.state_id')
        ->select('states.name')
        ->where('cities.id', $city->id)
        ->get();

        $state;

        foreach ($states as $statesColum){

            $state = $statesColum;
        }


        return view('admins.cities.show', compact('city','state'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\City  $city
     * @return \Illuminate\Http\Response
     */
    public function edit(City $city)
    {
         $states = State::paginate();

       $selectStates = array();

       $selectStates[0] = '-- Selecione um Estado --';

       foreach($states as $State)
       {
        $selectStates[$State->id] = $State->name;

    }
        return view('admins.cities.edit', compact('city', 'selectStates'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\City  $city
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, City $city)
    {
        $city->update($request->all());

        return redirect()->route('cities.edit', $city->id)
        ->with('status', 'Cidade editada com sucesso');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\City  $city
     * @return \Illuminate\Http\Response
     */
    public function destroy(City $city)
    {
     $city->delete();

     return back()->with('status', 'A Cidade foi excluido');
 }
}

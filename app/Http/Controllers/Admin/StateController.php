<?php

namespace App\Http\Controllers\Admin;

use App\State;
use App\Country;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class StateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $states = State::paginate();

        return view('admins.states.index', compact('states'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $countries = Country::paginate();

        $selectCountries = array();

        $selectCountries[0] = '-- Selecione um País --';

        foreach($countries as $country) {
            $selectCountries[$country->id] = $country->name;
        }

        return view('admins.states.create', compact('selectCountries'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
     return redirect()->route('states.edit', $state->id)
     ->with('status', 'Estado cadastrado com sucesso');
 }

    /**
     * Display the specified resource.
     *
     * @param  \App\State  $state
     * @return \Illuminate\Http\Response
     */
    public function show(State $state)
    {
        $counties = \DB::table('states')
        ->join('countries', 'countries.id', '=', 'states.country_id')
        ->select('countries.name')
        ->where('states.id', $state->id)
        ->get();

        $country;

        foreach ($counties as $countryColum){

            $country = $countryColum;
        }

        return view('admins.states.show', compact('state', 'country'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\State  $state
     * @return \Illuminate\Http\Response
     */
    public function edit(State $state)
    {
       $countries = Country::paginate();

       $selectCountries = array();

       $selectCountries[0] = '-- Selecione um País --';

       foreach($countries as $country)
       {
        $selectCountries[$country->id] = $country->name;

    }
    return view('admins.states.edit', compact('state','selectCountries'));
}

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\State  $state
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, State $state)
    {
        $state->update($request->all());

        return redirect()->route('states.edit', $state->id)
        ->with('status', 'Estado editado com sucesso');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\State  $state
     * @return \Illuminate\Http\Response
     */
    public function destroy(State $state)
    {
        $state->delete();
        
        return back()->with('status', 'O estado foi excluido');
    }
}

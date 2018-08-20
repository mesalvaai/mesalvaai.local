<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\period;

class PeriodController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $periods = Period::Paginate();
        return view('admins.periods.index',compact('periods'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admins.periods.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
         $messages = [
            
            'max' => 'Valor máximo de caracteres excedido.',
            'required' => 'Este campo é obrigatório.',
        ];

        $validator = \Validator::make($request->all(), [

            'name' => 'required|max:255',
            
            

        ], $messages);

        if ($validator->fails()) {

            return redirect()->back()
            ->withErrors($validator)
            ->withInput();  


        }
        else
        {


       
         $slug = str_slug($request->input('name'));
         $period = new Period();
         $period->name = $request->input('name');
         $period->slug = $slug;
         $period->save();

         return redirect()->route('periods.edit', $period->id)
         ->with('status', 'salva com sucesso');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Period $period)
    {
        //
        return view ('admins.periods.edit',compact('period'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Period $Period)
    {
        //
        $period->update($request->all());
        return redirect()->route('periods.index', $period->id)
        ->with('status', 'editada com sucesso');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Period $period)
    {
        //
        $area->delete();

        return back()->with('status', 'excluída com sucesso');
    }
}

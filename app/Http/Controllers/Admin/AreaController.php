<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Str;


use App\Area;

class AreaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */



    public function index()
    {
        //

        $areas = Area::Paginate();
        return view('admins.areas.index',compact('areas'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admins.areas.create');
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
            'name.unique' => 'Já existe uma categoria com este nome.',
            'max' => 'Valor máximo de caracteres excedido.',
            'required' => 'Este campo é obrigatório.',
        ];

        $validator = \Validator::make($request->all(), [

            'name' => 'bail|required|unique:categories|max:255',
            'description' => 'bail|required|max:255',
            'slug' => 'bail|required|max:1',

        ], $messages);

        if ($validator->fails()) {

            return redirect()->back()
            ->withErrors($validator)
            ->withInput();  


        }
        
         $slug = str_slug($request->input('name'));
         $area = new Area();
         $area->name = $request->input('name');
         $area->description = $request->input('description');
         $area->slug = $slug;
         $area->save();
        
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
    public function edit(Area $area)
    {
        //
        return view ('admins.areas.edit',compact('area'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Area $area)
    {
        //
        $area->update($request->all());
        return redirect()->route('areas.index', $area->id)
        ->with('status', 'editada com sucesso');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Area $area)
    {
        //
        $area->delete();

        return back()->with('status', 'excluída com sucesso');
    }
}

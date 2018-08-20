<?php

namespace App\Http\Controllers\Admin;

use App\Institutions;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class InstitutionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $institutions = Institutions::paginate();

        // Repassando para a view
     return view('admins.institutions.index', compact('institutions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admins.institutions.create', compact('institutions'));
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
      'name.unique' => 'Já existe uma instituição com esse nome, cadastrada!',
      'phone.unique' => 'Já existe uma instituição com esse telefone, cadastrada!',
      'cpnj.unique' => 'Já existe uma instituição com esse CNPJ, cadastrada!',
      'max' => 'Valor máximo de caracteres excedido!',
     
    ];
    $validator = \Validator::make($request->all(), [
      'name' => 'required|unique:institutions|max:150',
      'slug' => 'required|max:150',
      'phone'=> 'required|unique:institutions|max:16',
      'cpnj' => 'required|unique:institutions|max:18',
      'cpe'  => 'required|max:9',
      'street' => 'required|max:45',
      'number' => 'required|max:5',
      'neighborhood' => 'required|max:45',
      'complement'   => 'required|max:45',
      'handbag' => 'required|integer',
      'logo' => 'required|max:45',
      'evaluation' => 'required|max:45',
      'description' => 'required',
      'status' => 'bail|required|max:1',
    ], $messages);

    if ($validator->fails()){
      return redirect()->back()
      ->withErrors($validator)
      ->withInput();  
    }


      $institutions = Institution::create($request->all());

      return redirect()->route('institutions.edit', $institutions->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Institutions  $institutions
     * @return \Illuminate\Http\Response
     */
    public function show(Institutions $institutions)
    {
        return view('admins.institutions.show', compact('institutions'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Institutions  $institutions
     * @return \Illuminate\Http\Response
     */
    public function edit(Institutions $institutions)
    {
        return view('admins.institutions.edit', compact('institutions'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Institutions  $institutions
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Institutions $institutions)
    {
        $messages = [
      'required' => 'Este campo é obrigatório!',
      'name.unique' => 'Já existe uma instituição com esse nome, cadastrada!',
      'phone.unique' => 'Já existe uma instituição com esse telefone, cadastrada!',
      'cpnj.unique' => 'Já existe uma instituição com esse CNPJ, cadastrada!',
      'max' => 'Valor máximo de caracteres excedido!',
     
    ];
    $validator = \Validator::make($request->all(), [
      'name' => 'required|unique:institutions|max:150',
      'slug' => 'required|max:150',
      'phone'=> 'required|unique:institutions|max:16',
      'cpnj' => 'required|unique:institutions|max:18',
      'cpe'  => 'required|max:9',
      'street' => 'required|max:45',
      'number' => 'required|max:5',
      'neighborhood' => 'required|max:45',
      'complement'   => 'required|max:45',
      'handbag' => 'required|integer',
      'logo' => 'required|max:45',
      'evaluation' => 'required|max:45',
      'description' => 'required',
      'status' => 'bail|required|max:1',
    ], $messages);

    if ($validator->fails()){
      return redirect()->back()
      ->withErrors($validator)
      ->withInput();  
    }
    $institutions->update($request->all());

    return redirect()->route('institutions.edit', $institutions->id)->with('status', 'Atualizado alterado com sucesso');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Institutions  $institutions
     * @return \Illuminate\Http\Response
     */
    public function destroy(Institutions $institutions)
    {
        $institutions->delete();

      return back()->with('status', 'Essa instituição foi excluido');
    }
}

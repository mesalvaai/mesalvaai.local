<?php

namespace App\Http\Controllers;

use App\MoipIntegration;
use Illuminate\Http\Request;

class MoipIntegrationController extends Controller
{
 
   public function pagamentoCreditCard($hash)
   {
     $retorno = MoipIntegration::pagamentoCreditCard($hash);

     return $retorno;
 }

 public function PagamentoBoleto()
 {
     $retorno = MoipIntegration::PagamentoBoleto();

     return $retorno;
 }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       return view('moip');
   }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\MoipIntegration  $moipIntegration
     * @return \Illuminate\Http\Response
     */
    public function show(MoipIntegration $moipIntegration)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\MoipIntegration  $moipIntegration
     * @return \Illuminate\Http\Response
     */
    public function edit(MoipIntegration $moipIntegration)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\MoipIntegration  $moipIntegration
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, MoipIntegration $moipIntegration)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\MoipIntegration  $moipIntegration
     * @return \Illuminate\Http\Response
     */
    public function destroy(MoipIntegration $moipIntegration)
    {
        //
    }
}

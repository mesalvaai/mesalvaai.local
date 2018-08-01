<?php

namespace App\Http\Controllers;

use App\MoipCreditCard;
use Illuminate\Http\Request;

class MoipCreditCardController extends Controller
{

   public function test()
   {

      return view('moip');
      
  }

  public function passaHash($hash)
  {
     $retorno = MoipCreditCard::test($hash);

     return $retorno;
 }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
     * @param  \App\MoipCreditCard  $moipCreditCard
     * @return \Illuminate\Http\Response
     */
    public function show(MoipCreditCard $moipCreditCard)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\MoipCreditCard  $moipCreditCard
     * @return \Illuminate\Http\Response
     */
    public function edit(MoipCreditCard $moipCreditCard)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\MoipCreditCard  $moipCreditCard
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, MoipCreditCard $moipCreditCard)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\MoipCreditCard  $moipCreditCard
     * @return \Illuminate\Http\Response
     */
    public function destroy(MoipCreditCard $moipCreditCard)
    {
        //
    }
}

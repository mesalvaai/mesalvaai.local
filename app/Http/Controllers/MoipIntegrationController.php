<?php

namespace App\Http\Controllers;

use App\MoipIntegration;
use Illuminate\Http\Request;

class MoipIntegrationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('moip');
    }

    public function pagamentoCreditCard($hash)
    {
        $retorno = MoipIntegration::pagamentoCreditCard($hash);
        return $retorno;
    }

    public function PagamentoBoleto()
    {
        $print = MoipIntegration::PagamentoBoleto();
        return view('visualizarBoleto', compact('print'));
    }

    public function test()
    {
        $retorno = MoipIntegration::test();
    }

    public function testt()
    {
        $print = MoipIntegration::testt();
        return view('visualizarBoleto', compact('print'));
    }

}

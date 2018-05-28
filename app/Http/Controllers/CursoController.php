<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CursoController extends Controller
{
    public function curso()
    {
    	return view('curso');
    }

    public function faculdade()
    {
    	return view('faculdade');
    }
}
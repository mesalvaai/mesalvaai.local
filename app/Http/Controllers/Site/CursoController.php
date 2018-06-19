<?php

namespace App\Http\Controllers\Site;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CursoController extends Controller
{
    public function curso()
    {
    	return view('sites.curso');
    }

    public function faculdade()
    {
    	return view('sites.faculdade');
    }
}
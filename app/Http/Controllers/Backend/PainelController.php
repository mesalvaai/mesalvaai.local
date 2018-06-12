<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PainelController extends Controller
{
    public function index()
    {
    	return view('backend.painel');
    }

    public function forms()
    {
    	return view('backend.forms');
    }

    public function charts()
    {
    	return view('backend.charts');
    }

    public function tables()
    {
    	return view('backend.tables');
    }

    public function ingresar()
    {
    	return view('backend.ingresar');
    }

    public function cadastrar()
    {
    	return view('backend.cadastrar');
    }
}

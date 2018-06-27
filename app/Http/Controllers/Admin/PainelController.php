<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PainelController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
    	return view('admins.painels.painel');
    }

    public function forms()
    {
    	return view('admins.painels.forms');
    }

    public function charts()
    {
    	return view('admins.painels.charts');
    }

    public function tables()
    {
    	return view('admins.painels.tables');
    }

    public function ingresar()
    {
    	return view('admins.painels.ingresar');
    }

    public function cadastrar()
    {
    	return view('admins.painels.cadastrar');
    }
}

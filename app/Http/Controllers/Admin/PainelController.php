<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\User;
use Auth;

class PainelController extends Controller
{
    public function __construct()
    {
        //$this->middleware('auth');
        $this->middleware('role:admin');
    }

    public function index()
    {
        //dd(Auth::user()->roles[0]['slug'] );
        //dd(Auth::user()->isRole('admin')); //Retorna true
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

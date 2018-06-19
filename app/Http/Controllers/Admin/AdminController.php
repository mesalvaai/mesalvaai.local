<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminController extends Controller
{
    public function index()
    {
    	return view('admins.painel');
    }

    public function forms()
    {
    	return view('admins.forms');
    }

    public function charts()
    {
    	return view('admins.charts');
    }

    public function tables()
    {
    	return view('admins.tables');
    }

    public function ingresar()
    {
    	return view('admins.ingresar');
    }

    public function cadastrar()
    {
    	return view('admins.cadastrar');
    }
}

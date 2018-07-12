<?php

namespace App\Http\Controllers\Financing;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;

class AdminController extends Controller
{
    public function __construct()
    {
    	$this->middleware('auth');
    	//$this->middleware('IsRoleAluno:role_fc');
        $this->middleware('IsRoleAluno:role_fc');
    }

    public function index(Request $request)
    {
    	$request->user()->authorizeRoles(['user', 'role_fc']);
        return view('adminfc.painelfc');
    }
}

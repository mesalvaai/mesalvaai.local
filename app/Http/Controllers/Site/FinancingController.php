<?php

namespace App\Http\Controllers\Site;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FinancingController extends Controller
{
    public function index()
    {
    	return view('sites.financing.index');
    }
}

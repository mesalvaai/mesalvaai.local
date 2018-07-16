<?php

namespace App\Http\Controllers\Site;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Campaign;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('sites.home');
    }

    public function home()
    {
        return view('sites.site');
    }

    public function test()
    {
        $campings = Campaign::get();
        return view('sites.tests.test', compact('campings'));
    }

     public function mimos()
    {
        return view('sites.mimos');
    }
}

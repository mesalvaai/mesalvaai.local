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
        //$campanhas = Campaign::where('status', 1)->paginate();
        $campanhas = Campaign::where('status', 1)->paginate(4);
        return view('sites.site', compact('campanhas', 'progress'));
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

    public function campanha($slug)
    {
        //$campanha = Campaign::where('slug', $slug)->first();
        $campanha = Campaign::where('slug', $slug)->first();
        if ($campanha) {
            return view('sites.campanha', compact('slug', 'campanha'));
        } else {
            abort(404, 'Aurl não existe');
        }
        
    }
}

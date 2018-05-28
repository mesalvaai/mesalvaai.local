<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class FrutasController extends Controller
{
    public function index()
    {
    	return view('frutas.index');
    }

    public function naranja()
    {
    	return 'Naranjas';
    }

    public function pera()
    {
    	return 'Peras ' . session('erro');
    }

    public function receberForm(Request $request)
    {
        $data = $request;
        return 'O nome da fruta e: ' . $request->input('name');
    }

    public function postFrutas(Request $request)
    {
        
        // $fruta = DB::table('users')->insert(
        //     ['name' => $request->input('name'),
        //     'email' => $request->input('email'),
        //     'password' => $request->input('password')]
        // );
        $fruta = DB::table('users')->get();
        dd($fruta);

        return redirect()->action('FrutasController@index');
    }

    public function getSaveFruta()
    {
        $fruta = DB::table('users')->get();
        dd($fruta);
        return view('frutas.create');
    }
}

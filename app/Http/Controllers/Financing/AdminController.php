<?php

namespace App\Http\Controllers\Financing;

use Illuminate\Http\Request;
use App\Http\Requests\Admin\StudentFormRequest;
use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Crypt;
//use Illuminate\Contracts\Encryption\DecryptException;

use Auth;
use App\City;
use App\State;
use App\User;

class AdminController extends Controller
{
    public function __construct()
    {
    	//$this->middleware('auth');
    	//$this->middleware('IsRoleAluno:role_fc');
        //$this->middleware('IsRoleAluno:role_fc');
    }

    public function index(Request $request)
    {
    	$request->user()->authorizeRoles(['user', 'role_fc']);
    	$idUser = Auth::user()->id;

  		//$encrypted = Crypt::encryptString('Hello world.');
		// $decrypted = Crypt::decryptString($encrypted);
		
		$encrypted = Crypt::encrypt($idUser);
		$decrypted = Crypt::decrypt($encrypted);

    	$states = State::orderBy('name', 'ASC')->pluck('name', 'id');
        $cities = City::orderBy('name', 'ASC')->pluck('name', 'id');
        return view('adminfc.painelfc', compact('idUser', 'states', 'cities', 'encrypted', 'decrypted'));
    }

    public function store(StudentFormRequest $request)
    {
        $request->user()->authorizeRoles(['user', 'role_fc']);
        $validated = $request->validated();

        return redirect()->route('students.edit', $student->id)->with('status', 'Estudante cadastrado com sucesso');
    }
}

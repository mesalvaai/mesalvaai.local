<?php

namespace App\Http\Controllers\Financing;

use Illuminate\Http\Request;
use App\Http\Requests\Financing\StoreStudentRequest;
use App\Http\Requests\Financing\StoreCampingRequest;
use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Crypt;
//use Illuminate\Contracts\Encryption\DecryptException;

use Auth;
use App\Category;
use App\Campaign;
use App\City;
use App\State;
use App\User;
use App\Student;


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
    	$request->user()->authorizeRoles(['role_fc']);
    	$idUser = Auth::user()->id;

  		//$encrypted = Crypt::encryptString('Hello world.');
		// $decrypted = Crypt::decryptString($encrypted);
		
		$encrypted = Crypt::encrypt($idUser);
		$decrypted = Crypt::decrypt($encrypted);

    	$states = State::orderBy('name', 'ASC')->pluck('name', 'id');
        $cities = City::orderBy('name', 'ASC')->pluck('name', 'id');
        return view('adminfc.create-student', compact('idUser', 'states', 'cities', 'encrypted', 'decrypted'));
    }

    public function store(StoreFinancingRequest $request)
    {
        //dd($request['status']);
        $request->user()->authorizeRoles(['role_fc']);
        $validated = $request->validated();

        $student = new Student();
        $student->user_id = $request->input('user_id');
        $student->name = $request->input('name');
        $student->email = $request->input('email');
        $student->phone = $request->input('phone');
        $student->state_id = $request->input('state_id');
        $student->city_id = $request->input('city_id');
        $student->status = $request->input('status');
        $student->save();
        $request->session()->put('student_id', $student->id);
        return redirect()->route('create.camping')->with('status', 'Estudante cadastrado com sucesso');
        // return redirect()->action(
        //     'Financing\AdminController@createCamping', ['student_id' => $student->id]
        // )->with('status', 'Estudante cadastrado com sucesso');
    }

    public function createCamping(Request $request)
    {
        //dd($request->session()->get('student_id'));
        $request->user()->authorizeRoles(['role_fc']);
        $idUser = Auth::user()->id;

        //$encrypted = Crypt::encryptString('Hello world.');
        // $decrypted = Crypt::decryptString($encrypted);
        
        $encrypted = Crypt::encrypt($idUser);
        $decrypted = Crypt::decrypt($encrypted);
        $categories = Category::orderBy('name', 'ASC')->pluck('name', 'id');
        $states = State::orderBy('name', 'ASC')->pluck('name', 'id');
        $cities = City::orderBy('name', 'ASC')->pluck('name', 'id');

        return view('adminfc.create-camping', compact('idUser', 'student_id', 'states', 'cities', 'encrypted', 'decrypted','categories'));
    }

    public function storeCamping(StoreCampingRequest $request)
    {
        //dd($request['student_id']);
        $request->user()->authorizeRoles(['role_fc']);
        $validated = $request->validated();

        $camping = new Campaign();
        $camping->student_id = $request['student_id'];
        $camping->category_id = $request['category_id'];
        $camping->title = $request['title'];
        $camping->abstract = $request['abstract'];
        $camping->description = $request['description'];
        $camping->start_date = $request['start_date'];
        $camping->end_date = $request['end_date'];
        $camping->file = $request['file'];
        $camping->goal = $request['goal'];
        $camping->save();
        // Deletando uma sessão específica:
        $request->session()->forget('student_id');
        return redirect()->route('create.rewards')->with('status', 'Sua campanha foi criado com sucesso');
    }

    public function createRewards()
    {
        return view('adminfc.create-rewards');
    }
}

<?php

namespace App\Http\Controllers\Financing;

use Illuminate\Http\Request;
use App\Http\Requests\Financing\StoreStudentRequest;
use App\Http\Requests\Financing\StoreCampingRequest;
use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\Response;

//use Illuminate\Contracts\Encryption\DecryptException;

use Auth;
use App\Category;
use App\Campaign;
use App\City;
use App\State;
use App\Student;
use App\Reward;
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
    	$request->user()->authorizeRoles(['role_fc']);
    	$idUser = Auth::user()->id;
        $campings = Campaign::where('student_id', $idUser)->orderBy('id', 'ASC')->paginate();
		
		$encrypted = Crypt::encrypt($idUser);
		$decrypted = Crypt::decrypt($encrypted);

        return view('adminfc.index', compact('idUser', 'campings'));
    }

    public function createStudent(Request $request)
    {
        $request->user()->authorizeRoles(['role_fc']);
        $idUser = Auth::user()->id;
        $studentId = Student::where('user_id', $idUser)->pluck('user_id');

        if ($studentId->count() > 0) {

            return redirect()->route('create.camping')->with('status', 'Crie sua campanha');
        } else {
            $encrypted = Crypt::encrypt($idUser);
            $decrypted = Crypt::decrypt($encrypted);

            $states = State::orderBy('name', 'ASC')->pluck('name', 'id');
            $cities = City::orderBy('name', 'ASC')->pluck('name', 'id');
            return view('adminfc.create-student', compact('idUser', 'states', 'cities', 'encrypted', 'decrypted'));
        }
        
    }

    public function storeStudent(StoreStudentRequest $request)
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
        $studentId = Student::where('user_id', $idUser)->pluck('user_id');
        $student_id = $studentId[0];

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
        //$camping->file = $request['file'];
        $camping->goal = $request['goal'];

        //Subida de la miniatura
        $image = $request->file('file');
        if ($image) {
            $image_path = time().$image->getClientOriginalName();
            \Storage::disk('images')->put($image_path, \File::get($image));
            $camping->file = $image_path;
        }

        //Subida de la miniatura
        // $video_file = $request->file('video');
        // if ($video_file) {
        //     $video_path = time() . $video_file->getClientOriginalName();
        //     \Storage::disk('videos')->put($video_path, \File::get($video_file));
        //     $camping->video_path = $video_path;
        // }

        $camping->save();
        // Deletando uma sessão específica:
        $request->session()->put('campaign_id', $camping->id);
        //$request->session()->forget('student_id');
        return redirect()->route('create.rewards')->with('status', 'Sua campanha foi criado com sucesso');
    }

    public function getFile($filename)
    {
        $file = Storage::disk('images')->get($filename);
        return new Response($file, 200);
    }

    public function createRewards($campingId = null)
    {
        //dd(Auth::user()->id);
        if (session()->get('campaign_id') || $campingId !== null) {
            return view('adminfc.create-rewards', compact('campingId'));
        } else {
            return redirect('/financing');
        }
        
    }

    public function storeRewards(Request $request)
    {
        //dd($request['student_id']);
        $request->user()->authorizeRoles(['role_fc']);
        //$validated = $request->validated();

        
        $rewards = new Reward();
        $rewards->user_id = Auth::user()->id;
        $rewards->campaign_id = $request['campaign_id'];
        $rewards->title = $request['title'];
        $rewards->donation = $request['donation'];
        $rewards->quantity = $request['quantity'];
        $rewards->description = $request['description'];
        $rewards->unlimited = $request['unlimited'];
        $rewards->delivery_date = $request['delivery_date'];
        $rewards->delivery_mode = $request['delivery_mode'];
        $rewards->variations = $request['variations'];
        $rewards->thanks = $request['thanks'];
        $rewards->status = $request['status'];

        $rewards->save();

        // Deletando uma sessão específica:
        $request->session()->forget('student_id');
        $request->session()->forget('campaign_id');

        return redirect()->route('financiamento.index')->with('status', 'Sua cmpanha esta pronta!!');
    }
}

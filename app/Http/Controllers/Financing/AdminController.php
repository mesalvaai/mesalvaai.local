<?php

namespace App\Http\Controllers\Financing;

use Illuminate\Http\Request;
use App\Http\Requests\Financing\StoreStudentRequest;
use App\Http\Requests\Financing\StudentUpdateRequest;
use App\Http\Requests\Financing\StoreCampingRequest;
use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Crypt;
//use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\Response;

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
    	$idUser = Auth::user()->students[0]['id'];
        //dd(Auth::user()->students[0]['id']);
        $campings = Campaign::where('student_id', $idUser)->orderBy('id', 'ASC')->paginate();
		
		$encrypted = Crypt::encrypt($idUser);
		$decrypted = Crypt::decrypt($encrypted);

        return view('adminfc.index', compact('idUser', 'campings'));
    }

    public function listStudent()
    {
        $students = Student::where('user_id', Auth::user()->id)->first();
        return view('adminfc.list-student', compact('students'));
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
    }

    public function editStudent(Request $request, $idStudent)
    {
        $request->user()->authorizeRoles(['role_fc']);
        $idUser = Auth::user()->id;
        $student = Student::where('id', $idStudent)->first();

        $encrypted = Crypt::encrypt($idUser);
        $decrypted = Crypt::decrypt($encrypted);

        $states = State::orderBy('name', 'ASC')->pluck('name', 'id');
        $cities = City::orderBy('name', 'ASC')->pluck('name', 'id');
        return view('adminfc.edit-student', compact('student', 'states', 'cities', 'encrypted', 'decrypted'));
        
        
    }

    public function updateStudent(StudentUpdateRequest $request, $idStudent)
    {
        $request->user()->authorizeRoles(['role_fc']);
        $validated = $request->validated();

        $student = Student::find($idStudent);
        //$student->fill($request->all())->save();
        $student->user_id = Auth::user()->id;
        $student->name = $request->input('name');
        $student->email = $request->input('email');
        $student->cpf = $request->input('cpf');
        $student->phone = $request->input('phone');
        $student->data_of_birth = $request->input('data_of_birth');
        $student->how_met_us = $request->input('how_met_us');
        $student->cep = $request->input('cep');
        $student->state_id = $request->input('state_id');
        $student->city_id = $request->input('city_id');
        $student->street = $request->input('street');
        $student->number = $request->input('number');
        $student->neighborhood = $request->input('neighborhood');
        $student->complement = $request->input('complement');
        $student->status = $request->input('status');
        $student->save();
        return redirect()->route('edit.student', $idStudent)->with('status', 'Dados atualizados com sucesso');
    }

    /**
     * [Inicio Modulo de criação de campanhas]
     */
    public function createCamping(Request $request)
    {
        $request->user()->authorizeRoles(['role_fc']);
        $idUser = Auth::user()->id;
        $studentId = Student::where('user_id', $idUser)->pluck('id');

        if (empty($studentId[0]) == true){
            return redirect()->route('create.student')->with('status', 'Complete seu cadastro para criar sua campanha');
        } else {
            $student_id = $studentId[0];
            $encrypted = Crypt::encrypt($idUser);
            $decrypted = Crypt::decrypt($encrypted);
            $categories = Category::orderBy('name', 'ASC')->pluck('name', 'id');
            $states = State::orderBy('name', 'ASC')->pluck('name', 'id');
            $cities = City::orderBy('name', 'ASC')->pluck('name', 'id');

            return view('adminfc.create-camping', compact('idUser', 'student_id', 'states', 'cities', 'encrypted', 'decrypted','categories'));
        }
        
        
    }

    public function storeCamping(StoreCampingRequest $request)
    {
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
        $image = $request->file('file_path');
        if ($image) {
            $image_path = time().$image->getClientOriginalName();
            \Storage::disk('images')->put($image_path, \File::get($image));
            $camping->file_path = $image_path;
        }

        $camping->save();

        // Deletando uma sessão específica:
        $request->session()->put('campaign_id', $camping->id);
        //$request->session()->forget('student_id');
        return redirect()->route('create.rewards')->with('status', 'Sua campanha foi criado com sucesso');
    }

    public function showCamping($idCamping)
    {

        $camping = Campaign::where('id', $idCamping)->where('student_id', Auth::user()->students[0]['id'])->first();

        if ($camping == null) {
            abort(404, 'Aurl não existe');
        }

        if (Auth::user()->students[0]['id'] != $camping->student_id) {

            abort(403, 'Não autorizado');
        }

        return view('adminfc.show-camping', compact('camping'));
    }

    public function editCamping(Request $request, $idCamping)
    {
        $request->user()->authorizeRoles(['role_fc']);
        $idUser = Auth::user()->id;

        $studentId = Student::where('user_id', $idUser)->pluck('id');

        $student_id = $studentId[0];
        
        $categories = Category::orderBy('name', 'ASC')->pluck('name', 'id');
        $states = State::orderBy('name', 'ASC')->pluck('name', 'id');
        $cities = City::orderBy('name', 'ASC')->pluck('name', 'id');

        $campaign = Campaign::where('id', $idCamping)->first();
        //dd($campaign);
        return view('adminfc.edit-camping', compact('campaign','idUser', 'student_id', 'states', 'cities', 'encrypted', 'decrypted','categories'));
    }

    public function updateCamping(StoreCampingRequest $request, $idCamping)
    {
        $request->user()->authorizeRoles(['role_fc']);
        $validated = $request->validated();

        $camping = Campaign::find($idCamping);
        $camping->student_id = $request['student_id'];
        $camping->category_id = $request['category_id'];
        $camping->title = $request['title'];
        $camping->abstract = $request['abstract'];
        $camping->description = $request['description'];
        $camping->start_date = $request['start_date'];
        $camping->end_date = $request['end_date'];
        $camping->goal = $request['goal'];
        $camping->institution = $request['institution'];
        $camping->course = $request['course'];
        $camping->period = $request['period'];
        $camping->location = $request['location'];
        $camping->status = $request['status'];

        //Subida de la miniatura
        $image = $request->file('file_path');
        if ($image) {
            $image_path = time().$image->getClientOriginalName();
            \Storage::disk('images')->put($image_path, \File::get($image));
            $camping->file_path = $image_path;
        }
 
        $camping->save();

        // Deletando uma sessão específica:
        $request->session()->put('campaign_id', $camping->id);
        //$request->session()->forget('student_id');
        return redirect()->route('create.rewards')->with('status', 'Sua campanha foi atualizado com sucesso');
    }

    public function getFile($filename)
    {
        $file = Storage::disk('images')->get($filename);
        return new Response($file, 200);
    }

    /**
     * [Inicio Modulo de Recompensas]
     */
    public function listRewards(Request $request)
    {
        $request->user()->authorizeRoles(['role_fc']);
        $idUser = Auth::user()->students[0]['id'];
        $campings = Campaign::where('student_id', $idUser)->orderBy('id', 'ASC')->paginate();
        
        $encrypted = Crypt::encrypt($idUser);
        $decrypted = Crypt::decrypt($encrypted);

        return view('adminfc.rewards', compact('idUser', 'campings'));
    }

    public function createRewards($campingId = null)
    {
        if (session()->get('campaign_id') || $campingId !== null) {
            return view('adminfc.create-rewards', compact('campingId'));
        } else {
            return redirect('/financing');
        }
        
    }

    public function storeRewards(Request $request)
    {
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

    public function showReward($idReward)
    {
        $reward = Reward::where('id', $idReward)->first();
        return view('adminfc.show-reward', compact('reward'));
    }

    public function editReward($idReward)
    {
        $reward = Reward::where('id', $idReward)->first();
        $campingId = $reward->campaing_id;
        return view('adminfc.edit-rewards', compact('reward', 'campingId'));
    }

    public function updateReward(Request $request, $idReward)
    {
        $request->user()->authorizeRoles(['role_fc']);
        //$validated = $request->validated();
        
        $rewards = Reward::find($idReward);
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

        return redirect()->route('edit.reward', $idReward)->with('status', 'Dados Atualizados!!');
    }
}

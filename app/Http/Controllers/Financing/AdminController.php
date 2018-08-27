<?php

namespace App\Http\Controllers\Financing;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Str;
use App\Http\Requests\Financing\StoreCampingRequest;
use App\Http\Requests\Financing\StoreStudentRequest;
use App\Http\Requests\Financing\StudentUpdateRequest;
use App\Http\Requests\Financing\StoreRewardRequest;


use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\Response;


use FormatTime;
use Auth;
use App\Category;
use App\Campaign;
use App\City;
use App\Location;
use App\State;
use App\Student;
use App\Reward;
use App\Period;
use App\User;
use Image;


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
        if($campings->count() == 0){
            return redirect()->route('create.camping')->with('status', 'Você ainda não crio sua campanha, esta na hora de començar!!');
        }

        $encrypted = Crypt::encrypt($idUser);
        $decrypted = Crypt::decrypt($encrypted);

        return view('adminfc.index', compact('idUser', 'campings'));
    }

    public function listStudent()
    {
        $students = Student::where('user_id', Auth::user()->id)->first();
        

        if ($students == null) {
            return redirect()->route('create.student')->with('status', 'Ainda não cadastrou seus dados!!');
        }
        return view('adminfc.list-student', compact('students'));
    }

    public function createStudent(Request $request)
    {
        $request->user()->authorizeRoles(['role_fc']);
        $idUser = Auth::user()->id;
        $studentId = Student::where('user_id', $idUser)->pluck('id');

        if ($studentId->count() > 0) {
            $campingId = Campaign::where('student_id', $studentId[0])->pluck('id');
            if($campingId->count() > 0){
                return redirect()->route('financiamento.index');
            }
            return redirect()->route('create.camping')->with('status', 'Você ainda não crio sua campanha, esta na hora de començar!!');
        } else {
            $encrypted = Crypt::encrypt($idUser);
            $decrypted = Crypt::decrypt($encrypted);

            // $states = State::orderBy('name', 'ASC')->pluck('name', 'id');
            // $cities = City::orderBy('name', 'ASC')->pluck('name', 'id');
            $countries = Location::getPaises();

           //Add ID do pais do usuário
           //Brasil id = 3469034
            $idPais = 3469034;

            $states = Location::getEstados($idPais);
            $periodo = Period::get()->pluck('name', 'slug');
            return view('adminfc.create-student', compact('idUser','states','countries', 'idPais', 'encrypted', 'decrypted', 'periodo'));
        }
        
    }

    public function storeStudent(StoreStudentRequest $request)
    {

        $request->user()->authorizeRoles(['role_fc']);
        $validated = $request->validated();

        $student = new Student();
        $student->user_id = Auth::user()->id;
        $student->name = $request->input('name');
        $student->email = $request->input('email');
        $student->cpf = $request->input('cpf');
        $student->phone = $request->input('phone');
        $student->data_of_birth = FormatTime::FormatDataDB($request->input('data_of_birth'));
        $student->how_met_us = $request->input('how_met_us');
        $student->cep = $request->input('cep');
        $student->institution = $request->input('institution');
        $student->course = $request->input('course_id');
        $student->period = $request->input('period_id');
        $student->country_id = $request->input('country_id');
        $student->state_id = $request->input('state_id');
        $student->city_id = $request->input('city_id');
        $student->street = $request->input('street');
        $student->number = $request->input('number');
        $student->neighborhood = $request->input('neighborhood');
        $student->complement = $request->input('complement');
        $student->status = $request->input('status');
        $student->save();

        $request->session()->put('student_id', $student->id);
        return redirect()->route('create.camping')->with('status', 'O cadastro foi completado, falta pouco para criar sua campanha GRATUITAMENTE.');
    }

    public function editStudent(Request $request, $idStudent)
    {
        $request->user()->authorizeRoles(['role_fc']);
        $idUser = Auth::user()->id;
        $student = Student::where('id', $idStudent)->first();

        $encrypted = Crypt::encrypt($idUser);
        $decrypted = Crypt::decrypt($encrypted);

        // $states = State::orderBy('name', 'ASC')->pluck('name', 'id');
        // $cities = City::orderBy('name', 'ASC')->pluck('name', 'id');
        //Add ID do pais do usuário
        //Brasil id = 3469034
        $idPais = 3469034;
        $countries = Location::getPaises();

        if ($student->country_id == null) {
            $countries = Location::getPaises();
            //Add ID do pais do usuário
            //Brasil id = 3469034
            $idPais = 3469034;
            $states = Location::getEstados($idPais);
            $idEstado = 29; //Bahia
            $cities = Location::getCidades($idPais, $idEstado);
        } else {
            $states = Location::getEstados($student->country_id);
            $cities = Location::getCidades($student->country_id, $student->state_id);
        }

        return view('adminfc.edit-student', compact('student', 'countries', 'states', 'cities', 'idPais', 'encrypted', 'decrypted'));        
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
        $student->data_of_birth  = FormatTime::FormatDataDB($request->input('data_of_birth'));
        $student->how_met_us = $request->input('how_met_us');
        $student->cep = $request->input('cep');
        $student->country_id = $request->input('country_id');
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
            $categories = Category::where('status', 1)->orderBy('name', 'ASC')->pluck('name', 'id');
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
        $camping->slug = Str::slug($request['title']);
        $camping->abstract = $request['abstract'];
        $camping->description = $request['description'];
        $camping->start_date = FormatTime::FormatDataDB($request['start_date']);
        $camping->end_date = FormatTime::FormatDataDB($request['end_date']);
        $camping->goal = str_replace(',','.',str_replace('.','',$request['goal']));
        $camping->facebook = $request['facebook'];
        $camping->twitter = $request['twitter'];
        $camping->instagram = $request['instagram'];
        $camping->terms_of_use = $request['terms_of_use'];

        $existSlug = $camping::where('slug', $camping->slug)->pluck('slug');
        if($existSlug->count() > 0){
            $camping->slug = Str::slug($request['title'] . '-' . rand(5, 99));
        }

        //Subida de la miniatura
        $image = $request->file('file_path');
        if ($image) {
            $image_path = time().'_'.str_random(4).'.'.$image->getClientOriginalExtension();
            \Storage::disk('images')->put($image_path, \File::get($image));
            $camping->file_path = $image_path;
        }

        $camping->save();
        // Deletando uma sessão específica:
        $request->session()->put('campaign_id', $camping->id);
        //$request->session()->forget('student_id');
        if ($request['op'] == 'add_r') {
            return redirect()->route('create.rewards', $camping->id)->with('status', 'Vamos lá, crie suas recompensas');
        } elseif ($request['op'] == 'add') {
            return redirect()->route('view.camping', $camping->id)->with('status', 'Sua campanha foi criada, pode lançar quando quiser');
        } elseif ($request['op'] == 'show_c') {
            return redirect()->route('view.camping', $camping->id)->with('status', 'Olha como esta ficando, pode lançar sua campanha ou alterar sim você quiser');
        } else { 
            return redirect()->route('financiamento.index')->with('status', 'Sua campanha foi criada, pode lançar quando quiser');
        } 
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
        $camping->slug = Str::slug($request['title']);
        $camping->abstract = $request['abstract'];
        $camping->description = $request['description'];
        $camping->start_date = FormatTime::FormatDataDB($request['start_date']);
        $camping->end_date = FormatTime::FormatDataDB($request['end_date']);
        $camping->goal = str_replace(',','.',str_replace('.','',$request['goal']));
        // $camping->institution = $request['institution'];
        // $camping->course = $request['course'];
        // $camping->period = $request['period'];
        $camping->location = $request['location'];
        $camping->facebook = $request['facebook'];
        $camping->twitter = $request['twitter'];
        $camping->instagram = $request['instagram'];
        $camping->status = $request['status'];
        $camping->terms_of_use = $request['terms_of_use'];

        //Subida de la miniatura
        $image = $request->file('file_path');

        if ($image) {
            //$image_path = time().$image->getClientOriginalName();
            $image_path = time().'_'.str_random(4).'.'.$image->getClientOriginalExtension();
            \Storage::disk('images')->put($image_path, \File::get($image));
            $camping->file_path = $image_path;
        }
        // if ($image) {
        //     //get filename with extension
        //     //$filenamewithextension = $request->file('profile_image')->getClientOriginalName();
        //     $filenamewithextension = $image->getClientOriginalName(); //1534820296vestibular.jpg


        //     //get filename without extension, Ex 1534820358vestibular
        //     $filename = pathinfo($filenamewithextension, PATHINFO_FILENAME);

        //     //get file extension , Ex = jpg
        //     $extension = $image->getClientOriginalExtension();


        //     //filename to store
        //     $filenametostore = $filename.'_'.time().'.'.$extension;

        //     //Upload File
        //     //$request->file('profile_image')->storeAs('public/profile_images', $filenametostore);
        //     //$request->file('profile_image')->storeAs('public/profile_images/thumbnail', $filenametostore);
        //     $image->storeAs('public/uploads/campanha', $filenametostore);
        //     $image->storeAs('public/uploads/campanha/thumbnail', $filenametostore);


        //     //Resize image here
        //     $thumbnailpath = public_path('uploads/campanha/thumbnail/'.$filenametostore);
        //     //Image::make(Input::file('artist_pic')->getRealPath())->resize(120,75);
        //     $img = Image::make($image->getRealPath())->resize(400, 150, function($constraint) {
        //         $constraint->aspectRatio();
        //     });
        //     $img->save($thumbnailpath);
        //     $camping->file_path = $thumbnailpath;
        // }

        $camping->save();

        // Deletando uma sessão específica:
        $request->session()->put('campaign_id', $camping->id);
        //$request->session()->forget('student_id');
        //return redirect()->route('create.rewards')->with('status', 'Sua campanha foi atualizado com sucesso');
        if ($request['op'] == 'add_r') {
            return redirect()->route('create.rewards', $camping->id)->with('status', 'Vamos lá, crie suas recompensas');
        } elseif ($request['op'] == 'add') {
            return redirect()->route('view.camping', $camping->id)->with('status', 'Sua campanha foi criada, pode lançar quando quiser');
        } elseif ($request['op'] == 'show_c') {
            return redirect()->route('view.camping', $camping->id)->with('status', 'Olha como esta ficando, pode lançar sua campanha ou alterar sim você quiser');
        } else { 
            return redirect()->route('financiamento.index')->with('status', 'Sua campanha foi criada, pode lançar quando quiser');
        }
    }

    public function getFile($filename)
    {
        $file = Storage::disk('images')->get($filename);
        return new Response($file, 200);
    }

    public function viewCamping($idCamping)
    {

        $camping = Campaign::where('id', $idCamping)->where('student_id', Auth::user()->students[0]['id'])->first();

        if ($camping == null) {
            abort(404, 'Aurl não existe');
        }

        if (Auth::user()->students[0]['id'] != $camping->student_id) {

            abort(403, 'Não autorizado');
        }

        return view('adminfc.view-camping', compact('camping'));
    }

    public function publishCamping(Request $request, $id)
    {
        $camping = Campaign::find($id);
        $user_id = Student::where('id', $camping->student_id)->pluck('user_id');
        if ($user_id[0] == Auth::user()->id) {
            $camping->published = 1;
            $camping->save();

            return redirect()->route('view.camping', $camping->id)->with('status', 'Sua campanha foi lançada');
        } else {
            return redirect()->route('view.camping', $camping->id)->with('erro', 'Ocurreu algum erro');
        }
        
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

    public function storeRewards(StoreRewardRequest $request)
    {
        $request->user()->authorizeRoles(['role_fc']);
        //$validated = $request->validated();
        
        $rewards = new Reward();
        $rewards->user_id = Auth::user()->id;
        $rewards->campaign_id = $request['campaign_id'];
        $rewards->title = $request['title'];
        $rewards->donation = str_replace(',','.',str_replace('.','',$request['donation']));
        $rewards->description = $request['description'];
        $rewards->quantity = $request['quantity'];
        $rewards->unlimited = $request['unlimited'];
        $rewards->delivery_date = FormatTime::FormatDataDB($request['delivery_date']);
        $rewards->delivery_mode = $request['delivery_mode'];
        $rewards->variations = $request['variations'];
        $rewards->thanks = $request['thanks'];
        $rewards->status = $request['status'];
        if (($rewards->quantity == null) and ($rewards->unlimited == null)) {
            return back()->with('error', 'Precissa prencher uma quantidade ou selecionar ilimitado');
        } 
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
        $rewards->delivery_date = FormatTime::FormatDataDB($request['delivery_date']);
        $rewards->delivery_mode = $request['delivery_mode'];
        $rewards->variations = $request['variations'];
        $rewards->thanks = $request['thanks'];
        $rewards->status = $request['status'];

        $rewards->save();

        // Deletando uma sessão específica:
        $request->session()->forget('student_id');
        $request->session()->forget('campaign_id');

        //return redirect()->route('edit.reward', $idReward)->with('status', 'Dados Atualizados!!');

        if ($request['op'] == 'add_r') {
            return redirect()->route('create.rewards', $rewards->campaign_id)->with('status', 'Vamos lá, crie mais uma recompensas');
        } elseif ($request['op'] == 'add') {
            return redirect()->route('view.camping', $rewards->campaign_id)->with('status', 'Sua campanha foi criada, pode lançar quando quiser');
        } elseif ($request['op'] == 'show_c') {
            return redirect()->route('view.camping', $rewards->campaign_id)->with('status', 'Olha como esta ficando, pode lançar sua campanha ou alterar sim você quiser');
        } else { 
            return redirect()->route('financiamento.index')->with('status', 'Sua campanha foi criada, pode lançar quando quiser');
        }
    }

}

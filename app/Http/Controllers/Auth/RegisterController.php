<?php

namespace App\Http\Controllers\Auth;

use App\User;
use DB;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Foundation\Auth\RegistersUsers;


class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    //protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        
        //$_role = 'role_fc';
        //$encrypted = Crypt::encrypt($_role);
        
        if (isset($data['_role'])) {
            $decrypted = Crypt::decrypt($data['_role']);

            $role = DB::table('roles')->where('slug', $decrypted)->first();
            if ($role != null) {
               $user = User::create([
                    'name' => $data['name'],
                    'email' => $data['email'],
                    'password' => bcrypt($data['password']),
                ]); 

                $insertRoleUser = DB::table('role_user')->insert(
                    ['role_id' => $role->id, 'user_id' => $user->id]
                );

                return $user;
            } 
        } else {
            return User::create([
                'name' => $data['name'],
                'email' => $data['email'],
                'password' => bcrypt($data['password']),
            ]);
        }
        return redirect()->route('create.project')->with('status', 'O registro não foi criado!!');
        
    }

    /**
     * The user has been registered.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  mixed  $user
     * @return mixed
     */
    protected function registered(Request $request, $user)
    {
        if($user->hasRole('role_fc')) {
            return redirect('/financing/create');
        } elseif ($user->hasRole('role_cursos')) {
            return redirect('/cursos');
        } else {
            return redirect('/painel');
        }
    }
}

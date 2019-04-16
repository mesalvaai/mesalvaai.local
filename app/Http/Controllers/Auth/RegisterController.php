<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Role;
use App\RoleUser;
use DB;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Foundation\Auth\RegistersUsers;


class RegisterController extends Controller
{

    use RegistersUsers;
    
    public function __construct()
    {
        $this->middleware('guest');
    }
    
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);
    }

    //adiciona usuario financiamento/criar-conta
    protected function create(array $data)
    {
        $role = Role::where('slug', 'role_fc')->first();

        if ($role) {

            $user = User::create([
                'name' => $data['name'],
                'email' => $data['email'],
                'password' => $data['password'],
            ]); 

            $insertRoleUser = RoleUser::insert(
                ['role_id' => $role->id, 'user_id' => $user->id]
            );

            return $user;
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

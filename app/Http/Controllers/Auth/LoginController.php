<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
<<<<<<< HEAD
    //protected $redirectTo = '/painel';
=======
    protected $redirectTo = '/painel';
>>>>>>> 0ae3c23096ea6432cf9e357590306b60c7da0d78

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
<<<<<<< HEAD

    protected function authenticated($request, $user)
    {

        if($user->hasRole('role_fc')) {
            return redirect('/financing');
        } elseif ($user->hasRole('role_cursos')) {
            return redirect('/cursos');
        } else {
            return redirect('/painel');
        }
    }
=======
>>>>>>> 0ae3c23096ea6432cf9e357590306b60c7da0d78
}

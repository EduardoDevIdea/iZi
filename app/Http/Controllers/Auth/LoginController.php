<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use App\User;

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

    public function authenticated (Request $request, $usuario){

        $user_id = auth()->user()->id;

        $user = User::where('id', $user_id)->first();

        //dd($user->autorizado);

        if($user->autorizado != TRUE){

            auth()->logout();

            return redirect()->back()->with('inativo', 'Você está sem permissão para acessar o sistema.');
        } 
    }

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/index'; //direciona para este caminho quando o usuário é autenticado com sucesso

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
}

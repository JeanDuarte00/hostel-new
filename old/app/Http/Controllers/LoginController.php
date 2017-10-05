<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

//Class needed for login and Logout logic
use Illuminate\Foundation\Auth\AuthenticatesUsers;

//Auth facade
use Auth;

class LoginController extends Controller
{
    //Trait
    use AuthenticatesUsers;

    protected $redirectTo = '/';

    //Custom guard for seller
    protected function guard()
    {
      return Auth::guard('cliente');
    }

    public function mostrarLoginForm()
    {
        return view('cliente.auth.login');
    }

    public function logout(Request $request){
        Auth::guard('cliente')->logout();
        $request->session()->flush();
        $request->session()->regenerate();
        return redirect($this->redirectTo);
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cliente;

//Validator facade used in validator method
use Illuminate\Support\Facades\Validator;

//Auth Facade used in guard
use Auth;

class ClienteController extends Controller
{

    protected $redirectPath = '/cliente/login';

    public function mostrarRegistroFrom() {

        return view('cliente.auth.registrar');
    }

    public function registrar(Request $request) {

         //Validates data
        $this->validator($request->all())->validate();

       //Create seller
        $cliente = $this->create($request->all());

        //Authenticates seller
        $this->guard()->login($cliente);

       //Redirects sellers
        return redirect($this->redirectPath);

    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255',
            'password' => 'required|min:6|confirmed',
        ]);
    }

    //Create a new seller instance after a validation.
    protected function create(array $data)
    {
        return Cliente::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);
    }

    protected function guard()
    {
        return Auth::guard('cliente');
    }


}

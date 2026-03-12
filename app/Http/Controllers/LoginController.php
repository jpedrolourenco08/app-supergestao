<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function index(){
        return view('site.login', ['titulo' => 'Login']);
    }

    public function autenticar(Request $request){
        $rules = [
            'usuario' => 'email',
            'senha' => 'required'
        ];

        $feedback = [
            'usuario.email' => 'Preencha seu usuário',
            'senha.required' => 'Preencha sua senha'
        ];

        $request->validate($rules, $feedback);
        print_r($request->all());
    }
}
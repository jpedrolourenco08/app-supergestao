<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class LoginController extends Controller
{
    public function index(Request $request){
        $erro = '';

        if($request->get('erro') == 1){
            $erro = 'Usuário ou senha inválidos.';
        }

       if($request->get('erro') == 2){
            $erro = 'Realize o login para acessar essa página.';
        }

        return view('site.login', ['titulo' => 'Login', 'erro' => $erro]);
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

        $email = $request->get('usuario'); 
        $senha = $request->get('senha');

        $user = new User();

        $usuario = $user->where('email', $email)
            ->where('password', $senha)
            ->get()
            ->first();

        if(isset($usuario->name)){
            session_start();
            $_SESSION['nome'] = $usuario->name;
            $_SESSION['email'] = $usuario->email;

            return redirect()->route('app.clientes');
        } else {
            return redirect()->route('site.login', ['erro' => 1]);
        }
    }
}
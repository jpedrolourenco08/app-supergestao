<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SiteContato;
use App\Models\MotivoContato;

class ContatoController extends Controller
{
    public function contato(Request $request){
        
        $motivo_contato = MotivoContato::all();
    
        return view('site.contato', [
            'titulo' => 'Contato', 
            'motivo_contato' => $motivo_contato
        ]);
    }

    public function salvar(Request $request){

        //validação dos dados vindos da request
        $request->validate(
        $regras = [
            'nome' => 'required|min:3|max:50',
            'telefone' => 'required',
            'email' => 'email',
            'motivo_contatos_id' => 'required',
            'mensagem' => 'required|max:200'
        ],
        $feedback = [
            'nome.min' => 'O campo nome deve ter no mínimo 3 caracteres',
            'nome.max' => 'O campo nome deve ter no máximo 50 caracteres',
            'nome.required' => 'O campo nome é obrigatório',
            'telefone.required' => 'O campo telefone é obrigatório',
            'email.email' => 'O campo e-mail não foi preenchido corretamente',
            'motivo_contatos_id.required' => 'O campo motivo do contato é obrigatório',
            'mensagem.max' => 'O campo mensagem deve ter no máximo 200 caracteres',
            'mensagem.required' => 'O campo mensagem é obrigatório'
        ]
        );
        
        $request->validate($regras, $feedback);
        SiteContato::create($request->all());
        return redirect()->route('site.index');
    }
}
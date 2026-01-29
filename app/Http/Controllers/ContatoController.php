<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SiteContato;

class ContatoController extends Controller
{
    public function contato(Request $request){
        
        $motivo_contato = [
            '1' => 'Dúvida',
            '2' => 'Elogio',
            '3' => 'Reclamação'
        ];
    
        return view('site.contato', [
            'titulo' => 'Contato', 
            'motivo_contato' => $motivo_contato
        ]);
    }

    public function salvar(Request $request){

        //validação dos dados vindos da request
        $request->validate([
            'nome' => 'required|min:3|max:50',
            'telefone' => 'required',
            'email' => 'required',
            'motivo_contato' => 'required',
            'mensagem' => 'required|max:200'
        ]);
        //SiteContato::create($request->all());
    }
}
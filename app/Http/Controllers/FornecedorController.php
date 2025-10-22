<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FornecedorController extends Controller
{
    public function index(){
        $fornecedores = [
            0 => [
                'nome' => 'Carlinhos', 
                'status' => 'Ativo', 
                'cnpj' => '71.665.968/0001-85',
                'ddd' => '16',
                'telefone' => '90000-0000'
            ],
            1 => [
                'nome' => 'Josesinho', 
                'status' => 'Inativo', 
                'cnpj' => '',
                'ddd' => '16',
                'telefone' => '90000-0000'
            ],
            2 => [
                'nome' => 'Larissinho', 
                'status' => 'Ativo', 
                'cnpj' => '71.625.945/0001-22',
                'ddd' => '11',
                'telefone' => '91111-1111'
            ]
        ];
        
        return view('app.fornecedor.index', compact('fornecedores'));
    }
}
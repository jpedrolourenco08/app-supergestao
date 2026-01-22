<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Fornecedor;

class FornecedorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //instanciando o objeto
        $fornecedor = new Fornecedor();
        $fornecedor->nome = 'João Fornecedor';
        $fornecedor->site = 'joaofornecedor.com.br';
        $fornecedor->uf = 'SP';
        $fornecedor->email = 'joao@fornecedor.com.br';
        $fornecedor->save();

        //método create
        Fornecedor::create([
            'nome' => 'Pedro Fornecedor',
            'site' => 'pedrofornecedor.com.br',
            'uf' => 'MG',
            'email' => 'pedro@fornecedor.com.br',
        ]);

        //método insert
        DB::table('fornecedores')->insert([
            'nome' => 'Reinaldo Fornecedor',
            'site' => 'reinaldofornecedor.com.br',
            'uf' => 'MS',
            'email' => 'reinaldo@fornecedor.com.br',
        ]);
    }
}
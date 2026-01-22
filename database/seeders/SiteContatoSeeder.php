<?php

namespace Database\Seeders;

use Database\Factories\SiteContatoFactory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\SiteContato;

class SiteContatoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        /*
        $contato = new SiteContato();
        $contato->nome = 'Sistema do Sul';
        $contato->telefone = '(16)99999-9999 ';
        $contato->email = 'sistemasul@email.co';
        $contato->motivo_contato = 1;
        $contato->mensagem = 'Seja bem-vindo ao Super Gestão';
        $contato->save();
        */

        \App\Models\SiteContato::factory()->count(100)->create();;
        
    }
}
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('unidades', function (Blueprint $table) {
            $table->id();
            $table->string('unidade', 5); //cm, mm, kg, gm -> sigla da unidade
            $table->string('descrição', 30); //detalhe da unidade de medida
            $table->timestamps();
        });

        //relacionando com tb_produtos
        Schema::table('produtos', function(Blueprint $table){
            $table->unsignedBigInteger('unidade_id');
            $table->foreign('unidade_id')->references('id')->on('unidades');
        });

        //relacionando com tb_produto_detalhes
         Schema::table('produto_detalhes', function(Blueprint $table){
            $table->unsignedBigInteger('unidade_id');
            $table->foreign('unidade_id')->references('id')->on('unidades');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //remover relacionamento com tb_produto_detalhes
        Schema::table('produto_detalhes', function(Blueprint $table){
            $table->dropForeign('produto_detalhes_unidade_id_foreign'); //remove a fk
            $table->dropColumn('unidade_id'); //remove a coluna           
        }); 
        
        //remover relacionamento com tb_produtos
        Schema::table('produtos', function(Blueprint $table){
            $table->dropForeign('produto_detalhes_unidade_id_foreign'); //remove a fk
            $table->dropColumn('unidade_id'); //remove a coluna           
        }); 
        
        Schema::dropIfExists('unidades');
    }
};
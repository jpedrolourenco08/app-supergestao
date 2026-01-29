<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TestController;
use App\Http\Controllers\FornecedorController;
/*
|--------------------------------------------------------------------------
| Web Routes
| Registra as rotas que irão ser aplicadas na Web, permitindo os cookies e sessão
|--------------------------------------------------------------------------
*/

//namespace\Classe::class, 'método'
Route::get('/',[\App\Http\Controllers\PrincipalController::class,'principal'])->name('site.index'); 
Route::get('/sobre-nos',[\App\Http\Controllers\SobreNosController::class,'sobreNos'])->name('site.sobre-nos');
Route::get('/contato',[\App\Http\Controllers\ContatoController::class,'contato'])->name('site.contato');
Route::post('/contato',[\App\Http\Controllers\ContatoController::class,'salvar'])->name('site.contato.salvar');
Route::get('/login', function(){return "Login";})->name('site.login');

Route::prefix('/app')->  group(function(){
  Route::get('/clientes',function(){return "Clientes";})->name('app.clientes');
  Route::get('/fornecedores', [FornecedorController::class, 'index'])->name('app.fornecedores');
  Route::get('/produtos', function(){return "Produtos";})->name('app.produtos');
});

Route::get('/teste/{p1}/{p2}', [TestController::class, 'test'])->name('teste');

Route::fallback(function(){
  echo 'A rota acessada não existe. <a href="'.route('site.index').'">Clique aqui</a> para ir para a página inicial.';
});
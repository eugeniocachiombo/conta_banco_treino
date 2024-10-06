<?php

use App\Http\Controllers\Acesso\AcessoController;
use App\Http\Controllers\Usuario\UsuarioController;
use App\Http\Controllers\Conta\ContaController;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

Route::get('/', function(){
    return redirect()->route("usuario.autenticacao");
});

Route::prefix("/usuario")->name("usuario.")->group(function () {
    Route::get('/cadastro', [UsuarioController::class, 'cadastrar'])->name("cadastro")->middleware("usuario.terminado");
    Route::get('/autenticacao', [UsuarioController::class, 'autenticar'])->name("autenticacao")->middleware("usuario.terminado");
    Route::get('/inicio', [UsuarioController::class, 'iniciar'])->name("index")->middleware("usuario.logado");
    Route::get('/sair', [UsuarioController::class, 'sair'])->name("sair")->middleware("usuario.logado");
    Route::get('/editar/dados', [UsuarioController::class, 'editarDados'])->name("editar.dados")->middleware("usuario.logado");
    Route::get('/alterar/senha', [UsuarioController::class, 'alterarSenha'])->name("alterar.senha")->middleware("usuario.logado");
});

Route::prefix("/conta")->name("conta.")->group(function () {
   Route::get('/listar/minhas/contas', [ContaController::class, 'listarLogado'])->name("listar.logado")->middleware("usuario.logado");
   Route::get('/listar/adicionar/contas', [ContaController::class, 'adicionarContas'])->name("adicionar.contas")->middleware("usuario.logado");
   Route::get('/listar/contas', [ContaController::class, 'listarContas'])->name("listar.contas")->middleware("usuario.logado");
});

Route::prefix("/acesso")->name("acesso.")->group(function () {
   Route::get('/modificar/acesso', [AcessoController::class, 'modificarAcesso'])->name("acesso.modificar")->middleware("usuario.logado");
});

Route::get("/migrate", function(){
    Artisan::call("migrate");
    return "Informações migradas";
});

Route::get("/drop", function () {
    DB::statement('SET FOREIGN_KEY_CHECKS=0');
    Artisan::call('migrate:reset');
    DB::statement('DROP TABLE IF EXISTS migrations');
    DB::statement('SET FOREIGN_KEY_CHECKS=1');
    return "Base de dados limpeza total";
});
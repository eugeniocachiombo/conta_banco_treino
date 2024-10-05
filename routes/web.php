<?php

use App\Http\Controllers\Usuario\UsuarioController;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

Route::prefix("/usuario")->name("usuario.")->group(function () {
    Route::get('/cadastro', [UsuarioController::class, 'cadastrar'])->name("cadastro")->middleware("usuario.logado");
    Route::get('/autenticacao', [UsuarioController::class, 'autenticar'])->name("autenticacao")->middleware("usuario.logado");
    Route::get('/inicio', [UsuarioController::class, 'iniciar'])->name("index")->middleware("usuario.terminado");
    Route::get('/sair', [UsuarioController::class, 'sair'])->name("sair")->middleware("usuario.terminado");
    Route::get('/editar/dados', [UsuarioController::class, 'editarDados'])->name("editar.dados")->middleware("usuario.terminado");
    Route::get('/alterar/senha', [UsuarioController::class, 'alterarSenha'])->name("alterar.senha")->middleware("usuario.terminado");
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
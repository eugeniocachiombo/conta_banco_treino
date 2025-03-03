<?php

use App\Http\Controllers\Usuario\UsuarioController;
use Illuminate\Support\Facades\Route;

Route::prefix("/usuario")->name("usuario.")->group(function () {
    Route::get('/cadastro', [UsuarioController::class, 'cadastrar'])->name("cadastro")->middleware("usuario.terminado");
    Route::get('/autenticacao', [UsuarioController::class, 'autenticar'])->name("autenticacao")->middleware("usuario.terminado");
    Route::get('/inicio', [UsuarioController::class, 'iniciar'])->name("index")->middleware("usuario.logado");
    Route::get('/sair', [UsuarioController::class, 'sair'])->name("sair")->middleware("usuario.logado");
    Route::get('/editar/dados', [UsuarioController::class, 'editarDados'])->name("editar.dados")->middleware("usuario.logado");
    Route::get('/alterar/senha', [UsuarioController::class, 'alterarSenha'])->name("alterar.senha")->middleware("usuario.logado");
});
<?php

use App\Http\Controllers\Usuario\UsuarioController;
use App\Http\Livewire\Usuario\Autenticacao;
use App\Http\Livewire\Usuario\Cadastro;
use App\Http\Livewire\Usuario\Inicio;
use Illuminate\Support\Facades\Route;

Route::prefix("/usuario")->name("usuario.")->group(function () {
    Route::get('/cadastro', Cadastro::class)->name("cadastro")->middleware("usuario.terminado");
    Route::get('/autenticacao', Autenticacao::class)->name("autenticacao")->middleware("usuario.terminado");
    Route::get('/inicio', Inicio::class)->name("index")->middleware("usuario.logado");
    Route::get('/sair', [UsuarioController::class, 'sair'])->name("sair")->middleware("usuario.logado");
    Route::get('/editar/dados', [UsuarioController::class, 'editarDados'])->name("editar.dados")->middleware("usuario.logado");
    Route::get('/alterar/senha', [UsuarioController::class, 'alterarSenha'])->name("alterar.senha")->middleware("usuario.logado");
});
<?php

use App\Http\Controllers\Conta\ContaController;
use App\Http\Livewire\Conta\ListarLogado;
use Illuminate\Support\Facades\Route;


Route::prefix("/conta")->name("conta.")->group(function () {
    Route::get('/listar/minhas/contas', ListarLogado::class)->name("listar.logado")->middleware("usuario.logado");
    Route::get('/listar/adicionar/contas', [ContaController::class, 'adicionarContas'])->name("adicionar.contas")->middleware("usuario.logado");
    Route::get('/listar/contas', [ContaController::class, 'listarContas'])->name("listar.contas")->middleware("usuario.logado");
 });
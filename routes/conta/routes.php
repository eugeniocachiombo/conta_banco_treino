<?php

use App\Http\Controllers\Conta\ContaController;
use App\Http\Livewire\Conta\AdicionarContas;
use App\Http\Livewire\Conta\ListarContas;
use App\Http\Livewire\Conta\ListarLogado;
use Illuminate\Support\Facades\Route;


Route::prefix("/conta")->name("conta.")->group(function () {
    Route::get('/listar/minhas/contas', ListarLogado::class)->name("listar.logado")->middleware("usuario.logado");
    Route::get('/listar/adicionar/contas', AdicionarContas::class)->name("adicionar.contas")->middleware("usuario.logado");
    Route::get('/listar/contas', ListarContas::class)->name("listar.contas")->middleware("usuario.logado");
 });
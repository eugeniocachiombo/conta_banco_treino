<?php

use App\Http\Controllers\Transacao\TransacaoController;
use Illuminate\Support\Facades\Route;


Route::prefix("/transacao")->name("transacao.")->group(function () {
    Route::get('/depositar', [TransacaoController::class, 'depositar'])->name("depositar")->middleware("usuario.logado");
    Route::get('/depositar/usuario/{id}', [TransacaoController::class, 'depositarNoUsuarioSelecionado'])->name("depositar.usuario")->middleware("usuario.logado");
    Route::get('/retirar', [TransacaoController::class, 'retirar'])->name("retirar")->middleware("usuario.logado");
    Route::get('/retirar/usuario/{id}', [TransacaoController::class, 'retirarNoUsuarioSelecionado'])->name("retirar.usuario")->middleware("usuario.logado");
    Route::get('/transferir', [TransacaoController::class, 'transferir'])->name("transferir")->middleware("usuario.logado");
 });
<?php

use App\Http\Controllers\Transacao\TransacaoController;
use App\Http\Livewire\Transacao\Depositar;
use App\Http\Livewire\Transacao\DepositarUsuario;
use App\Http\Livewire\Transacao\Retirar;
use App\Http\Livewire\Transacao\RetirarUsuario;
use App\Http\Livewire\Transacao\Transferir;
use Illuminate\Support\Facades\Route;


Route::prefix("/transacao")->name("transacao.")->group(function () {
    Route::get('/depositar', Depositar::class)->name("depositar")->middleware("usuario.logado");
    Route::get('/depositar/usuario/{id}', DepositarUsuario::class)->name("depositar.usuario")->middleware("usuario.logado");
    Route::get('/retirar', Retirar::class)->name("retirar")->middleware("usuario.logado");
    Route::get('/retirar/usuario/{id}', RetirarUsuario::class)->name("retirar.usuario")->middleware("usuario.logado");
    Route::get('/transferir', Transferir::class)->name("transferir")->middleware("usuario.logado");
 });
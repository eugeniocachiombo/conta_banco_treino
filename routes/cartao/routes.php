<?php

use App\Http\Controllers\Cartao\CartaoController;
use App\Http\Livewire\Cartao\Habilitar;
use App\Http\Livewire\Cartao\Lista;
use Illuminate\Support\Facades\Route;

Route::prefix("/cartao")->name("cartao.")->group(function () {
    Route::get('/habilitar', Habilitar::class)->name("habilitar")->middleware("usuario.logado");
    Route::get('/lista', Lista::class)->name("lista")->middleware("usuario.logado");
});
<?php

use App\Http\Livewire\Agencia\Actualizar;
use App\Http\Livewire\Agencia\Cadastro;
use App\Http\Livewire\Agencia\Lista;
use Illuminate\Support\Facades\Route;

Route::prefix("/agencia")->name("agencia.")->group(function () {
    Route::get('/cadastro', Cadastro::class)->name("cadastro")->middleware("usuario.logado");
    Route::get('/lista', Lista::class)->name("lista")->middleware("usuario.logado");
    Route::get('/actualizar/{id}', Actualizar::class)->name("actualizar")->middleware("usuario.logado");
  });
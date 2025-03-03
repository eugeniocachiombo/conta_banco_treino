<?php

use App\Http\Livewire\Cliente\Actualizar;
use App\Http\Livewire\Cliente\Cadastro;
use App\Http\Livewire\Cliente\Lista;
use Illuminate\Support\Facades\Route;

Route::prefix("/cliente")->name("cliente.")->group(function () {
    Route::get('/associar', Cadastro::class)->name("cadastro")->middleware("usuario.logado");
    Route::get('/lista/todos', Lista::class)->name("lista")->middleware("usuario.logado");
    Route::get('/actualizar/{id}', Actualizar::class)->name("actualizar")->middleware("usuario.logado");
});

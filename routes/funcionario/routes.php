<?php

use App\Http\Livewire\Funcionario\Actualizar;
use App\Http\Livewire\Funcionario\Cadastro;
use App\Http\Livewire\Funcionario\Lista;
use Illuminate\Support\Facades\Route;

Route::prefix("/funcionario")->name("funcionario.")->group(function () {
    Route::get('/associar', Cadastro::class)->name("cadastro")->middleware("usuario.logado");
    Route::get('/lista/todos', Lista::class)->name("lista")->middleware("usuario.logado");
    Route::get('/actualizar/{id}', Actualizar::class)->name("actualizar")->middleware("usuario.logado");
});

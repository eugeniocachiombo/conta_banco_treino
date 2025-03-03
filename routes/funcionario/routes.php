<?php

use App\Http\Controllers\Funcionario\FuncionarioController;
use Illuminate\Support\Facades\Route;

Route::prefix("/funcionario")->name("funcionario.")->group(function () {
    Route::get('/associar', [FuncionarioController::class, 'cadastrar'])->name("cadastro")->middleware("usuario.logado");
    Route::get('/lista/todos', [FuncionarioController::class, 'listar'])->name("lista")->middleware("usuario.logado");
    Route::get('/actualizar/{id}', [FuncionarioController::class, 'actualizar'])->name("actualizar")->middleware("usuario.logado");
  });
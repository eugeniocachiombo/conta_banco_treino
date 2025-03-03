<?php

use App\Http\Controllers\Cliente\ClienteController;
use Illuminate\Support\Facades\Route;

Route::prefix("/cliente")->name("cliente.")->group(function () {
    Route::get('/associar', [ClienteController::class, 'cadastrar'])->name("cadastro")->middleware("usuario.logado");
    Route::get('/lista/todos', [ClienteController::class, 'listar'])->name("lista")->middleware("usuario.logado");
    Route::get('/actualizar/{id}', [ClienteController::class, 'actualizar'])->name("actualizar")->middleware("usuario.logado");
  });
<?php

use App\Http\Controllers\Agencia\AgenciaController;
use Illuminate\Support\Facades\Route;

Route::prefix("/agencia")->name("agencia.")->group(function () {
    Route::get('/cadastro', [AgenciaController::class, 'cadastrar'])->name("cadastro")->middleware("usuario.logado");
    Route::get('/lista', [AgenciaController::class, 'listar'])->name("lista")->middleware("usuario.logado");
    Route::get('/actualizar/{id}', [AgenciaController::class, 'actualizar'])->name("actualizar")->middleware("usuario.logado");
  });
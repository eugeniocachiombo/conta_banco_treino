<?php

use App\Http\Controllers\Cartao\CartaoController;
use Illuminate\Support\Facades\Route;

Route::prefix("/cartao")->name("cartao.")->group(function () {
    Route::get('/habilitar', [CartaoController::class, 'habilitar'])->name("habilitar")->middleware("usuario.logado");
    Route::get('/lista', [CartaoController::class, 'listar'])->name("lista")->middleware("usuario.logado");
    Route::get('/actualizar/{id}', [CartaoController::class, 'actualizar'])->name("actualizar")->middleware("usuario.logado");
  });
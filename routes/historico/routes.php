<?php

use App\Http\Controllers\Historico\HistoricoController;
use Illuminate\Support\Facades\Route;


Route::prefix("/historico")->name("historico.")->group(function () {
    Route::get('/lista', [HistoricoController::class, 'listar'])->name("lista")->middleware("usuario.logado");
  });
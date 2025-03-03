<?php

use App\Http\Controllers\Acesso\AcessoController;
use Illuminate\Support\Facades\Route;

Route::prefix("/acesso")->name("acesso.")->group(function () {
    Route::get('/modificar', [AcessoController::class, 'modificarAcesso'])->name("modificar")->middleware("usuario.logado");
 });
<?php

use App\Http\Controllers\Usuario\UsuarioController;
use Illuminate\Support\Facades\Route;

Route::prefix("/usuario")->name("usuario.")->middleware("usuario")->group(function () {
    Route::get('/inicio', [UsuarioController::class, 'iniciar'])->name("index");
    Route::get('/autenticacao', [UsuarioController::class, 'autenticar'])->name("autenticacao");
    Route::get('/cadastro', [UsuarioController::class, 'cadastrar'])->name("cadastro");
});

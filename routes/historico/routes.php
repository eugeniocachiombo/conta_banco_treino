<?php

use App\Http\Livewire\Historico\Lista;
use Illuminate\Support\Facades\Route;

Route::prefix("/historico")->name("historico.")->group(function () {
    Route::get('/lista', Lista::class)->name("lista")->middleware("usuario.logado");
});

<?php

use App\Http\Livewire\Acesso\Modificar;
use Illuminate\Support\Facades\Route;

Route::prefix("/acesso")->name("acesso.")->group(function () {
    Route::get('/modificar', Modificar::class)->name("modificar")->middleware("usuario.logado");
 });
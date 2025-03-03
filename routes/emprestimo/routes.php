<?php

use App\Http\Livewire\Emprestimo\Devolver;
use App\Http\Livewire\Emprestimo\Emprestar;
use App\Http\Livewire\Emprestimo\Lista;
use App\Http\Livewire\Emprestimo\ListaMeusEmprestimos;
use Illuminate\Support\Facades\Route;

Route::prefix("/emprestimo")->name("emprestimo.")->group(function () {
    Route::get('/emprestar/{id}', Emprestar::class)->name("emprestar")->middleware("usuario.logado");
    //Route::get('/cancelar/{id}', [EmprestimoController::class, 'cancelar'])->name("cancelar")->middleware("usuario.logado");
    Route::get('/devolver/{id}', Devolver::class)->name("devolver")->middleware("usuario.logado");
    Route::get('/lista/todos', Lista::class)->name("lista")->middleware("usuario.logado");
    Route::get('/lista/meus/emprestimos/{id}', ListaMeusEmprestimos::class)->name("lista.meus.emprestimos")->middleware("usuario.logado");
 });
 
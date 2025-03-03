<?php

use App\Http\Controllers\Emprestimo\EmprestimoController;
use Illuminate\Support\Facades\Route;

Route::prefix("/emprestimo")->name("emprestimo.")->group(function () {
    Route::get('/emprestar/{id}', [EmprestimoController::class, 'emprestar'])->name("emprestar")->middleware("usuario.logado");
    Route::get('/cancelar/{id}', [EmprestimoController::class, 'cancelar'])->name("cancelar")->middleware("usuario.logado");
    Route::get('/devolver/{id}', [EmprestimoController::class, 'devolver'])->name("devolver")->middleware("usuario.logado");
    Route::get('/lista/todos', [EmprestimoController::class, 'listar'])->name("lista")->middleware("usuario.logado");
    Route::get('/lista/meus/emprestimos/{id}', [EmprestimoController::class, 'listarMeusEmprestimos'])->name("lista.meus.emprestimos")->middleware("usuario.logado");
 });
 
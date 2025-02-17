<?php

use App\Http\Controllers\Acesso\AcessoController;
use App\Http\Controllers\Agencia\AgenciaController;
use App\Http\Controllers\Cartao\CartaoController;
use App\Http\Controllers\Cliente\ClienteController;
use App\Http\Controllers\Usuario\UsuarioController;
use App\Http\Controllers\Conta\ContaController;
use App\Http\Controllers\Emprestimo\EmprestimoController;
use App\Http\Controllers\Funcionario\FuncionarioController;
use App\Http\Controllers\Historico\HistoricoController;
use App\Http\Controllers\Transacao\TransacaoController;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

Route::get('/', function(){
    return redirect()->route("usuario.autenticacao");
});

Route::prefix("/usuario")->name("usuario.")->group(function () {
    Route::get('/cadastro', [UsuarioController::class, 'cadastrar'])->name("cadastro")->middleware("usuario.terminado");
    Route::get('/autenticacao', [UsuarioController::class, 'autenticar'])->name("autenticacao")->middleware("usuario.terminado");
    Route::get('/inicio', [UsuarioController::class, 'iniciar'])->name("index")->middleware("usuario.logado");
    Route::get('/sair', [UsuarioController::class, 'sair'])->name("sair")->middleware("usuario.logado");
    Route::get('/editar/dados', [UsuarioController::class, 'editarDados'])->name("editar.dados")->middleware("usuario.logado");
    Route::get('/alterar/senha', [UsuarioController::class, 'alterarSenha'])->name("alterar.senha")->middleware("usuario.logado");
});

Route::prefix("/conta")->name("conta.")->group(function () {
   Route::get('/listar/minhas/contas', [ContaController::class, 'listarLogado'])->name("listar.logado")->middleware("usuario.logado");
   Route::get('/listar/adicionar/contas', [ContaController::class, 'adicionarContas'])->name("adicionar.contas")->middleware("usuario.logado");
   Route::get('/listar/contas', [ContaController::class, 'listarContas'])->name("listar.contas")->middleware("usuario.logado");
});

Route::prefix("/acesso")->name("acesso.")->group(function () {
   Route::get('/modificar', [AcessoController::class, 'modificarAcesso'])->name("modificar")->middleware("usuario.logado");
});

Route::prefix("/transacao")->name("transacao.")->group(function () {
   Route::get('/depositar', [TransacaoController::class, 'depositar'])->name("depositar")->middleware("usuario.logado");
   Route::get('/depositar/usuario/{id}', [TransacaoController::class, 'depositarNoUsuarioSelecionado'])->name("depositar.usuario")->middleware("usuario.logado");
   Route::get('/retirar', [TransacaoController::class, 'retirar'])->name("retirar")->middleware("usuario.logado");
   Route::get('/retirar/usuario/{id}', [TransacaoController::class, 'retirarNoUsuarioSelecionado'])->name("retirar.usuario")->middleware("usuario.logado");
   Route::get('/transferir', [TransacaoController::class, 'transferir'])->name("transferir")->middleware("usuario.logado");
});

Route::prefix("/emprestimo")->name("emprestimo.")->group(function () {
   Route::get('/emprestar/{id}', [EmprestimoController::class, 'emprestar'])->name("emprestar")->middleware("usuario.logado");
   Route::get('/cancelar/{id}', [EmprestimoController::class, 'cancelar'])->name("cancelar")->middleware("usuario.logado");
   Route::get('/devolver/{id}', [EmprestimoController::class, 'devolver'])->name("devolver")->middleware("usuario.logado");
   Route::get('/lista/todos', [EmprestimoController::class, 'listar'])->name("lista")->middleware("usuario.logado");
   Route::get('/lista/meus/emprestimos/{id}', [EmprestimoController::class, 'listarMeusEmprestimos'])->name("lista.meus.emprestimos")->middleware("usuario.logado");
});

Route::prefix("/cliente")->name("cliente.")->group(function () {
  Route::get('/associar', [ClienteController::class, 'cadastrar'])->name("cadastro")->middleware("usuario.logado");
  Route::get('/lista/todos', [ClienteController::class, 'listar'])->name("lista")->middleware("usuario.logado");
  Route::get('/actualizar/{id}', [ClienteController::class, 'actualizar'])->name("actualizar")->middleware("usuario.logado");
});

Route::prefix("/funcionario")->name("funcionario.")->group(function () {
  Route::get('/associar', [FuncionarioController::class, 'cadastrar'])->name("cadastro")->middleware("usuario.logado");
  Route::get('/lista/todos', [FuncionarioController::class, 'listar'])->name("lista")->middleware("usuario.logado");
  Route::get('/actualizar/{id}', [FuncionarioController::class, 'actualizar'])->name("actualizar")->middleware("usuario.logado");
});

Route::prefix("/agencia")->name("agencia.")->group(function () {
  Route::get('/cadastro', [AgenciaController::class, 'cadastrar'])->name("cadastro")->middleware("usuario.logado");
  Route::get('/lista', [AgenciaController::class, 'listar'])->name("lista")->middleware("usuario.logado");
  Route::get('/actualizar/{id}', [AgenciaController::class, 'actualizar'])->name("actualizar")->middleware("usuario.logado");
});

Route::prefix("/cartao")->name("cartao.")->group(function () {
  Route::get('/habilitar', [CartaoController::class, 'habilitar'])->name("habilitar")->middleware("usuario.logado");
  Route::get('/lista', [CartaoController::class, 'listar'])->name("lista")->middleware("usuario.logado");
  Route::get('/actualizar/{id}', [CartaoController::class, 'actualizar'])->name("actualizar")->middleware("usuario.logado");
});

Route::prefix("/historico")->name("historico.")->group(function () {
  Route::get('/lista', [HistoricoController::class, 'listar'])->name("lista")->middleware("usuario.logado");
});

Route::get("/migrate", function(){
    Artisan::call("migrate");
    return "Informações migradas";
});

Route::get("/drop", function () {
    DB::statement('SET FOREIGN_KEY_CHECKS=0');
    Artisan::call('migrate:reset');
    DB::statement('DROP TABLE IF EXISTS migrations');
    DB::statement('SET FOREIGN_KEY_CHECKS=1');
    return "Base de dados limpeza total";
});
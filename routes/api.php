<?php

use App\Http\Controllers\Cartao\CartaoController;
use App\Http\Controllers\Conta\ContaController;
use App\Models\Cartao;
use App\Models\Conta;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/verificarConta/{num}', [ContaController::class, "verificarConta"]);

Route::get('/verificarCartao/{num}', [CartaoController::class, "verificarCartao"]);
Route::get('/autenticarCartao/{num}/{codigo}', [CartaoController::class, "autenticarCartao"]);
Route::get('/pagarComCartao/{num}/{codigo}/{quantia}', [CartaoController::class, "pagarComCartao"]);
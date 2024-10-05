<?php

namespace App\Http\Controllers\Conta;

use App\Http\Controllers\Controller;
use App\Models\Conta;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ContaController extends Controller
{
    public function listarLogado(){
        return view("conta.listaLogado");
    }
}

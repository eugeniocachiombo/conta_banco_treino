<?php

namespace App\Http\Controllers\Cliente;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ClienteController extends Controller
{
    public function cadastrar(){
        return view("cliente.cadastro");
    }
    public function listar(){
        return view("cliente.lista");
    }
}

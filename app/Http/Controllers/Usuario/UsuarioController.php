<?php

namespace App\Http\Controllers\Usuario;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UsuarioController extends Controller
{
    public function iniciar(){
        return view("inicio.index");
    }

    public function autenticar(){
        return view("usuario.autenticacao");
    }
    
    public function cadastrar(){
        return view("usuario.cadastro");
    }
}

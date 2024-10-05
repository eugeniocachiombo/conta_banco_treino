<?php

namespace App\Http\Controllers\Usuario;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

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

    public function sair(){
        Auth::logout();
        return redirect()->route("usuario.autenticacao");
    }

    public function editarDados(){
        return view("usuario.editar_dados");
    }

    public function alterarSenha(){
        return view("usuario.alterar_senha");
    }
}

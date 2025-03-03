<?php

namespace App\Http\Controllers\Usuario;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class UsuarioController extends Controller
{
   
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

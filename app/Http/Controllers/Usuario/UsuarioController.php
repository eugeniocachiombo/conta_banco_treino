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
}

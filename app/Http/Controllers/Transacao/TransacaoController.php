<?php

namespace App\Http\Controllers\Transacao;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TransacaoController extends Controller
{
    public function depositar(){
        return view("transacao.depositar");
    }

    public function depositarNoUsuarioSelecionado($id){
        return view("transacao.depositar_usuario", ["id"=>$id]);
    }

    public function retirar(){
        return view("transacao.retirar");
    }

    public function retirarNoUsuarioSelecionado($id){
        return view("transacao.retirar_usuario", ["id"=>$id]);
    }

    public function transferir(){
        return view("transacao.transferir");
    }
}

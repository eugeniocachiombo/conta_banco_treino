<?php

namespace App\Http\Controllers\Cartao;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CartaoController extends Controller
{
    public function habilitar(){
        return view("cartao.habilitar");
    }

    public function listar(){
        return view("cartao.lista");
    }

    public function actualizar($id){
        return view("cartao.actualizar", ["id"=>$id]);
    }
}

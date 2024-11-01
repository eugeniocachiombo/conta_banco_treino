<?php

namespace App\Http\Controllers\Agencia;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AgenciaController extends Controller
{
    public function cadastrar(){
        return view("agencia.cadastro");
    }

    public function listar(){
        return view("agencia.lista");
    }

    public function actualizar($id){
        return view("agencia.actualizar", ["id"=>$id]);
    }
}

<?php

namespace App\Http\Controllers\Funcionario;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FuncionarioController extends Controller
{
    public function cadastrar(){
        return view("funcionario.cadastro");
    }

    public function listar(){
        return view("funcionario.lista");
    }

    public function actualizar($id){
        return view("funcionario.actualizar", ["id"=>$id]);
    }
}

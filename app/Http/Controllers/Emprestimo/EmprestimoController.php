<?php

namespace App\Http\Controllers\Emprestimo;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class EmprestimoController extends Controller
{
    public function emprestar($id){
        return view("emprestimo.emprestar", ["id"=>$id]);
    }

    public function devolver($id){
        return view("emprestimo.devolver", ["id"=>$id]);
    }

    public function listar(){
        return view("emprestimo.lista");
    }

    public function listarMeusEmprestimos($id){
        return view("emprestimo.lista_meus_emprestimos", ["id"=>$id]);
    }
}

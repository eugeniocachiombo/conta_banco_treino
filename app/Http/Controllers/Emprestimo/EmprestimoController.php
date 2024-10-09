<?php

namespace App\Http\Controllers\Emprestimo;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class EmprestimoController extends Controller
{
    public function emprestar($id){
        return view("emprestimo.emprestar", ["id"=>$id]);
    }
}

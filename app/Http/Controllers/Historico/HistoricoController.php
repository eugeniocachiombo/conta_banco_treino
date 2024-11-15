<?php

namespace App\Http\Controllers\Historico;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HistoricoController extends Controller
{
    public function listar(){
        return view("historico.lista");
    }
}

<?php

namespace App\Http\Controllers\Acesso;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AcessoController extends Controller
{
   public function modificarAcesso(){
    return view("acesso.modificar");
   }
}

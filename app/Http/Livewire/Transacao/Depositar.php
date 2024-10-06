<?php

namespace App\Http\Livewire\Transacao;

use App\Models\User;
use Livewire\Component;

class Depositar extends Component
{
    public $listaGeral, $usuarioSelecionado = false;


    public function render()
    {
        $this->listaGeral = User::all();
        return view('livewire.transacao.depositar');
    }

    public function selecionarUsuario($id_usuario){
        $this->usuarioSelecionado = true;
        $usuario = User::find($id_usuario);
    }
}

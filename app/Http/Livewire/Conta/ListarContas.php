<?php

namespace App\Http\Livewire\Conta;

use App\Models\Conta;
use App\Models\User;
use Livewire\Component;

class ListarContas extends Component
{
    public $listaGeral, $tipoConta;

    public function render()
    {
        $this->listaGeral = User::all();
        return view('livewire.conta.listar-contas');
    }

    public function buscarTiposContaUsuario($id_usuario)
    {
        return Conta::where('id_usuario', $id_usuario)->get();
    }
}

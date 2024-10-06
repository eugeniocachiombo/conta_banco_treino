<?php

namespace App\Http\Livewire\Transacao;

use App\Models\User;
use Livewire\Component;

class Depositar extends Component
{
    public $listaGeral;


    public function render()
    {
        $this->listaGeral = User::all();
        return view('livewire.transacao.depositar');
    }
}

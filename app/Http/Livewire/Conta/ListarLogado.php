<?php

namespace App\Http\Livewire\Conta;

use App\Models\Conta;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class ListarLogado extends Component
{
    public $listaGeral;

    public function render()
    {
        $this->listaGeral = Conta::where("id", Auth::user()->id)->get();
        return view('livewire.conta.listar-logado');
    }
}

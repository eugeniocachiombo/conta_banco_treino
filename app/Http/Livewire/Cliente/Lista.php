<?php

namespace App\Http\Livewire\Cliente;

use App\Models\Cliente;
use Livewire\Component;

class Lista extends Component
{
    public $clientes;

    public function render()
    {
        $this->clientes = Cliente::all();
        return view('livewire.cliente.lista');
    }
}

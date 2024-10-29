<?php

namespace App\Http\Livewire\Cliente;

use App\Models\Cliente;
use App\Models\Morada;
use Livewire\Component;

class Lista extends Component
{
    public $clientes;

    public function render()
    {
        $this->clientes = Cliente::all();
        return view('livewire.cliente.lista');
    }

    public function buscarMorada($id){
        return Morada::find($id);
    }

    public function eliminarCliente($id){
        $cliente = Cliente::find($id);
        $cliente->delete();
        $this->emit('alerta', ['mensagem' => 'Cliente eliminado com sucesso', 'icon' => 'success', 'tempo' => 3000]);
    }
}

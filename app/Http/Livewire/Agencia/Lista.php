<?php

namespace App\Http\Livewire\Agencia;

use App\Models\Agencia;
use App\Models\Morada;
use Livewire\Component;

class Lista extends Component
{
    public $agencias;

    public function render()
    {
        $this->agencias = Agencia::all();
        return view('livewire.agencia.lista');
    }

    public function buscarLocalizacao($id){
        return Morada::find($id);
    }

    public function eliminarAgencia($id){
        $agencia = Agencia::find($id);
        $agencia->delete();
        $this->emit('alerta', ['mensagem' => 'Agencia eliminada com sucesso', 'icon' => 'success', 'tempo' => 3000]);
    }
}

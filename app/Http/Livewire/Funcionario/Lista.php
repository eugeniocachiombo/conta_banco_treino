<?php

namespace App\Http\Livewire\Funcionario;

use App\Models\Agencia;
use App\Models\Funcionario;
use App\Models\Morada;
use Livewire\Component;

class Lista extends Component
{
    public $funcionarios;

    public function render()
    {
        $this->funcionarios = Funcionario::all();
        return view('livewire.funcionario.lista');
    }

    public function buscarMorada($id){
        return Morada::find($id);
    }

    public function buscarAgencia($id){
        return Agencia::find($id);
    }

    public function eliminarFuncionario($id){
        $funcionario = Funcionario::find($id);
        $funcionario->delete();
        $this->emit('alerta', ['mensagem' => 'Funcionário eliminado com sucesso', 'icon' => 'success', 'tempo' => 3000]);
    }
}

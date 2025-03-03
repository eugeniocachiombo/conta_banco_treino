<?php

namespace App\Http\Livewire\Agencia;

use App\Models\Agencia;
use App\Models\Morada;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Lista extends Component
{
    public $agencias;
    public $usuario, $dados, $acesso;
    
    public function mount(){
        $this->usuario = Auth::user();
        $this->dados = $this->usuario->buscarDadosPessoais;
        $this->acesso = $this->usuario->buscarAcesso;
    }

    public function render()
    {
        $this->agencias = Agencia::all();
        return view('livewire.agencia.lista')->layout("layouts.usuario.app");
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

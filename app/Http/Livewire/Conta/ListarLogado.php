<?php

namespace App\Http\Livewire\Conta;

use App\Models\Conta;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class ListarLogado extends Component
{
    public $listaGeral;
    public $usuario, $dados, $acesso;

    public function mount(){
        $this->usuario = Auth::user();
        $this->dados = $this->usuario->buscarDadosPessoais;
        $this->acesso = $this->usuario->buscarAcesso;
    }

    public function render()
    {
        $this->listaGeral = Conta::where("id_usuario", Auth::user()->id)->get();
        return view('livewire.conta.listar-logado')
        ->layout("layouts.conta.app");
    }
}

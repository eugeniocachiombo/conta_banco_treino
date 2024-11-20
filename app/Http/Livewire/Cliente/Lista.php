<?php

namespace App\Http\Livewire\Cliente;

use App\Models\Cliente;
use App\Models\DadosPessoais;
use App\Models\Historico;
use App\Models\Morada;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Lista extends Component
{
    public $clientes;

    public function render()
    {
        $this->clientes = Cliente::all();
        return view('livewire.cliente.lista');
    }

    public function buscarMorada($id)
    {
        return Morada::find($id);
    }

    public function eliminarCliente($id)
    {
        $cliente = Cliente::find($id);
        $cliente->delete();
        $this->emit('alerta', ['mensagem' => 'Cliente eliminado com sucesso', 'icon' => 'success', 'tempo' => 3000]);

        $dadosPessoais = DadosPessoais::where("id_usuario", $cliente->id)->first();
        Historico::create([
            "id_usuario" => $cliente->id,
            "responsavel" => Auth::user()->id,
            "tema" => "Remoção de clientes associados",
            "descricao" => "Foi removido dos clientes efectivos <<{$dadosPessoais->nome} {$dadosPessoais->sobrenome}>> no sytem-bank",
        ]);
    }
}

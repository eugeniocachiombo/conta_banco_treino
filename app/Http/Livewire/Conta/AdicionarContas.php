<?php

namespace App\Http\Livewire\Conta;

use App\Models\Conta;
use App\Models\User;
use Livewire\Component;

class AdicionarContas extends Component
{
    public $listaGeral, $tipoConta;

    public function render()
    {
        $this->listaGeral = User::all();
        return view('livewire.conta.adicionar-contas');
    }

    public function buscarTiposContaUsuario($id_usuario)
    {
        return Conta::where('id_usuario', $id_usuario)->get();
    }

    public function adicionarConta($id_usuario){
        Conta::create([
            "tipo" => $this->tipoConta,
            "id_usuario" => $id_usuario
        ]);
        $this->emit('alerta', ['mensagem' => 'Conta adicionada com sucesso', 'icon' => 'success']);
    }

    public function buscarContaEmFaltaUsuario($id_usuario)
    {
        $corrente = Conta::where('id_usuario', $id_usuario)->where("tipo", "corrente")->exists();
        $salario = Conta::where('id_usuario', $id_usuario)->where("tipo", "salario")->exists();

        if ($corrente) {
            return Conta::where("tipo", "!=", "corrente")->select("tipo")->distinct()->get();
        } elseif ($salario) {
            return Conta::where("tipo", "!=", "salario")->select("tipo")->distinct()->get();
        } else {
            return Conta::select("tipo")->distinct()->get();
        }
    }
}

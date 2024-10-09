<?php

namespace App\Http\Livewire\Emprestimo;

use App\Models\Conta;
use App\Models\Emprestimo;
use App\Models\User;
use Livewire\Component;

class ListaMeusEmprestimos extends Component
{
    public $listaGeral, $id_usuario;

    public function mount($id){
        $this->id_usuario = $id;
    }

    public function render()
    {
        $this->listaGeral = User::where("id", $this->id_usuario)->get();
        return view('livewire.emprestimo.lista-meus-emprestimos');
    }

    public function cancelarEmprestimo($id_usuario, $id_conta){
        $emprestimo = Emprestimo::where("id_usuario", $id_usuario)->first();
        $conta = Conta::find($id_conta);
        if($emprestimo){
            $saldoConta = $conta->saldo;
            $novoSaldo = $saldoConta - $emprestimo->quantia;
            $conta->update(["saldo" => $novoSaldo]);
            $emprestimo->delete();
            $this->emit('alerta', ['mensagem' => 'Empréstimo cancelado com sucesso', 'icon' => 'success', 'tempo' => 3000]);
        }else{
            $this->emit('alerta', ['mensagem' => 'Não tem nenhum valor emprestado', 'icon' => 'warning', 'tempo' => 3000]);
        }
    }
}

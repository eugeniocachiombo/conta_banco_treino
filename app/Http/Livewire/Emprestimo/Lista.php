<?php

namespace App\Http\Livewire\Emprestimo;

use App\Models\Conta;
use App\Models\Emprestimo;
use App\Models\User;
use Livewire\Component;

class Lista extends Component
{ 
    public $listaGeral;

    public function render()
    {
        $this->listaGeral = User::all();
        return view('livewire.emprestimo.lista');
    }

    public function cancelarEmprestimo($id_usuario, $id_conta){
        $emprestimo = Emprestimo::where("id_usuario", $id_usuario)->first();
        $conta = Conta::find($id_conta);
        $saldoConta = $conta->saldo;
        
        $novoSaldo = $saldoConta - $emprestimo->quantia;
        $conta->update(["saldo" => $novoSaldo]);
        $emprestimo->delete();
        $this->emit('alerta', ['mensagem' => 'Empréstimo cancelado com sucesso', 'icon' => 'success', 'tempo' => 3000]);
    }
}

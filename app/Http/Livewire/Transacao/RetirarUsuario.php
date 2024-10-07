<?php

namespace App\Http\Livewire\Transacao;

use App\Models\Conta;
use App\Models\DadosPessoais;
use Livewire\Component;

class RetirarUsuario extends Component
{
    public $id_usuario, $dadosPessoais, $quantia,
     $contasUsuario, $tipoConta;

     protected $rules = [
        'tipoConta' => 'required',
        'quantia' => 'required',
    ];

    protected $messages = [
        'tipoConta.required' => 'Campo obrigatório',
        'quantia.required' => 'Campo obrigatório',
    ];

    public function mount($id){
        $this->id_usuario = $id;
    }

    public function render()
    {
        $this->dadosPessoais = DadosPessoais::where("id_usuario", $this->id_usuario)->first();
        $this->contasUsuario = Conta::where("id_usuario", $this->id_usuario)->get();
        return view('livewire.transacao.retirar-usuario');
    }

    public function depositar(){
        $this->validate();
        $conta = Conta::where("id_usuario", $this->id_usuario)
        ->where("id", $this->tipoConta)
        ->first();
        
        $saldoConta = $conta->saldo;
        $formatarQuantia1 = str_replace(".","", $this->quantia);
        $formatarQuantia2 = str_replace(",",".", $formatarQuantia1);
        
        if($saldoConta  >= $formatarQuantia2){
            $novoSaldo = $saldoConta - $formatarQuantia2;
            $conta->update(["saldo" => $novoSaldo]);
            $this->emit('alerta', ['mensagem' => 'Dinheiro retirado com sucesso', 'icon' => 'success', 'tempo' => 3000]);
            $this->quantia = $this->tipoConta = null;
        }
    }
}

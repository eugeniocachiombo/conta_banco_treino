<?php

namespace App\Http\Livewire\Transacao;

use App\Models\Conta;
use App\Models\DadosPessoais;
use Livewire\Component;

class DepositarUsuario extends Component
{
    public $id_usuario, $dadosPessoais, $quantia,
     $contasUsuario, $tipoConta;

    public function mount($id){
        $this->id_usuario = $id;
    }

    public function render()
    {
        $this->dadosPessoais = DadosPessoais::where("id_usuario", $this->id_usuario)->first();
        $this->contasUsuario = Conta::where("id_usuario", $this->id_usuario)->get();
        return view('livewire.transacao.depositar-usuario');
    }

    public function depositar(){
        $conta = Conta::where("id_usuario", $this->id_usuario)
        ->where("id", $this->tipoConta)
        ->first();

        $quantiaFormatada1 = str_replace(".", "", $this->quantia);
        $quantiaFormatada2 = str_replace(",", "", $quantiaFormatada1);
        $quantiaFormatada3 = intval($quantiaFormatada2);

        $saldoConta = $conta->saldo;
        $novoSaldo = $saldoConta + $quantiaFormatada3;

        $teste = number_format($novoSaldo, 2, ',', '.');

        dd($saldoConta, $quantiaFormatada3, $novoSaldo, $teste);
    }
}

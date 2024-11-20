<?php

namespace App\Http\Livewire\Transacao;

use App\Models\Conta;
use App\Models\DadosPessoais;
use App\Models\Emprestimo;
use App\Models\Historico;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class DepositarUsuario extends Component
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

    public function mount($id)
    {
        $this->id_usuario = $id;
    }

    public function render()
    {
        $this->dadosPessoais = DadosPessoais::where("id_usuario", $this->id_usuario)->first();
        $this->contasUsuario = Conta::where("id_usuario", $this->id_usuario)->get();
        return view('livewire.transacao.depositar-usuario');
    }

    public function depositar()
    {
        $this->validate();
        $conta = Conta::where("id_usuario", $this->id_usuario)
            ->where("id", $this->tipoConta)
            ->first();

        $saldoConta = $conta->saldo;
        $formatarQuantia1 = str_replace(".", "", $this->quantia);
        $formatarQuantia2 = str_replace(",", ".", $formatarQuantia1);
        $novoSaldo = $saldoConta + $formatarQuantia2;

        $conta->update(["saldo" => $novoSaldo]);
        $this->emit('alerta', ['mensagem' => 'Dinheiro depositado com sucesso', 'icon' => 'success', 'tempo' => 3000]);

        $dadosPessoais = DadosPessoais::where("id_usuario", $this->id_usuario)->first();
        Historico::create([
            "id_usuario" => $this->id_usuario,
            "responsavel" => Auth::user()->id,
            "tema" => "Depósito de dinheiro",
            "descricao" => "Foi depositado na conta de {$dadosPessoais->nome} {$dadosPessoais->sobrenome} {$this->quantia} kz em conta {$conta->tipo}",
        ]);

        $this->descontarEmprestimo($this->id_usuario);
        $this->quantia = $this->tipoConta = null;
    }

    public function descontarEmprestimo($id_usuario)
    {
        $emprestimo = Emprestimo::where("id_usuario", $id_usuario)->first();
        if ($emprestimo) {
            $conta = Conta::find($emprestimo->id_conta);

            if ($conta->saldo >= $emprestimo->quantia) {
                Conta::where("id", $conta->id)
                    ->update([
                        "saldo" => $conta->saldo - $emprestimo->quantia,
                    ]);

                $dadosPessoais = DadosPessoais::where("id_usuario", $id_usuario)->first();
                Historico::create([
                    "id_usuario" => $id_usuario,
                    "responsavel" => $id_usuario,
                    "tema" => "Devolução de dinheiro",
                    "descricao" => "Foi devolvido {$emprestimo->quantia} kz emprestado por {$dadosPessoais->nome} {$dadosPessoais->sobrenome} para a conta {$conta->tipo}",
                ]);

                $emprestimo->delete();
            }
        }
    }
}

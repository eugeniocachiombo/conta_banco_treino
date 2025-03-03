<?php

namespace App\Http\Livewire\Transacao;

use App\Models\Conta;
use App\Models\DadosPessoais;
use App\Models\Emprestimo;
use App\Models\Historico;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Transferir extends Component
{
    public $num_conta, $quantia, $msgErroNumConta;

    protected $rules = [
        'num_conta' => 'required',
        'quantia' => 'required',
    ];

    protected $messages = [
        'num_conta.required' => 'Campo obrigatório',
        'quantia.required' => 'Campo obrigatório',
    ];

    public function render()
    {
        return view('livewire.transacao.transferir')
        ->layout("layouts.usuario.app");
    }

    public function transferir()
    {
        $this->validate();

        if ($this->msgErroNumConta == null) {
            
            $contaRemente = Conta::where("num_conta", $this->num_conta)->first();
            $saldoContaRemente = $contaRemente->saldo;
            $quantiaFormatada1 = str_replace(".", "", $this->quantia);
            $quantiaFormatada2 = str_replace(",", ".", $quantiaFormatada1);
            $novoSaldoRemente = $saldoContaRemente + $quantiaFormatada2;
            $contaRemente->update(["saldo" => $novoSaldoRemente]);

            $contaProprietario = Conta::where("id_usuario", Auth::user()->id)->first();
            $saldoContaProprietario = $contaProprietario->saldo;
            $quantiaFormatada1 = str_replace(".", "", $this->quantia);
            $quantiaFormatada2 = str_replace(",", ".", $quantiaFormatada1);
            $novoSaldoProprietario = $saldoContaProprietario - $quantiaFormatada2;
            $contaProprietario->update(["saldo" => $novoSaldoProprietario]);

            $this->emit('alerta', ['mensagem' => 'Dinheiro transferido com sucesso', 'icon' => 'success', 'tempo' => 3000]);

            $dadosPessoais = DadosPessoais::where("id_usuario", $contaRemente->id_usuario)->first();
            Historico::create([
                "id_usuario" => $contaRemente->id_usuario,
                "responsavel" => Auth::user()->id,
                "tema" => "Transferência de dinheiro",
                "descricao" => "Foi transferido para {$dadosPessoais->nome} {$dadosPessoais->sobrenome} {$this->quantia} kz na conta {$contaRemente->tipo}",
            ]);

            $this->descontarEmprestimo($contaRemente->id_usuario);
            $this->quantia = $this->num_conta = null;
        }
    }

    public function descontarEmprestimo($id_usuario)
    {
        $emprestimo = Emprestimo::where("id_usuario", $id_usuario)->first();
        if ($emprestimo) {
            $conta = Conta::find($emprestimo->id_conta);

            if ($conta->saldo >= $emprestimo->quantia) {
                $quantiaFormatada = number_format($emprestimo->quantia, 2, ',', '.');

                Conta::where("id", $conta->id)
                    ->update([
                        "saldo" => $conta->saldo - $emprestimo->quantia,
                    ]);

                $dadosPessoais = DadosPessoais::where("id_usuario", $id_usuario)->first();
                Historico::create([
                    "id_usuario" => $id_usuario,
                    "responsavel" => $id_usuario,
                    "tema" => "Devolução de dinheiro",
                    "descricao" => "Foi removido {$quantiaFormatada} kz emprestado por {$dadosPessoais->nome} {$dadosPessoais->sobrenome} para a conta {$conta->tipo}",
                ]);

                $emprestimo->delete();
            }
        }
    }

    public function verificarContaExiste()
    {
        $this->msgErroNumConta = null;
        if ($this->num_conta != null) {
            $conta = Conta::where("num_conta", $this->num_conta)->first();
            isset($conta) ? $this->msgErroNumConta = null : $this->msgErroNumConta = "Conta não existe";
        }
    }
}

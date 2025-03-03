<?php

namespace App\Http\Livewire\Emprestimo;

use App\Models\Conta;
use App\Models\DadosPessoais;
use App\Models\Emprestimo;
use App\Models\Historico;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Lista extends Component
{
    public $listaGeral;
    public $usuario, $dados, $acesso;

    public function mount()
    {
        $this->usuario = Auth::user();
        $this->dados = $this->usuario->buscarDadosPessoais;
        $this->acesso = $this->usuario->buscarAcesso;
    }

    public function render()
    {
        $this->listaGeral = User::all();
        return view('livewire.emprestimo.lista')
        ->layout("layouts.usuario.app");
    }

    public function cancelarEmprestimo($id_usuario, $id_conta)
    {
        $emprestimo = Emprestimo::where("id_usuario", $id_usuario)->first();
        $conta = Conta::find($id_conta);
        $saldoConta = $conta->saldo;

        $novoSaldo = $saldoConta - $emprestimo->quantia;
        $conta->update(["saldo" => $novoSaldo]);
        $emprestimo->delete();
        $this->emit('alerta', ['mensagem' => 'Empréstimo cancelado com sucesso', 'icon' => 'success', 'tempo' => 3000]);

        $dadosPessoais = DadosPessoais::where("id_usuario", $id_usuario)->first();
        Historico::create([
            "id_usuario" => $id_usuario,
            "responsavel" => Auth::user()->id,
            "tema" => "Cancelamento de Empréstimo de dinheiro",
            "descricao" => "Foi cancelado o empréstimo de {$dadosPessoais->nome} {$dadosPessoais->sobrenome} ",
        ]);

    }
}

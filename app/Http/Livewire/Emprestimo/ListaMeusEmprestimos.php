<?php

namespace App\Http\Livewire\Emprestimo;

use App\Models\Conta;
use App\Models\DadosPessoais;
use App\Models\Emprestimo;
use App\Models\Historico;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class ListaMeusEmprestimos extends Component
{
    public $listaGeral, $id_usuario;
    public $usuario, $dados, $acesso;

    public function mount($id){
        $this->id_usuario = $id;
        $this->usuario = Auth::user();
        $this->dados = $this->usuario->buscarDadosPessoais;
        $this->acesso = $this->usuario->buscarAcesso;
    }

    public function render()
    {
        $this->listaGeral = User::where("id", $this->id_usuario)->get();
        return view('livewire.emprestimo.lista-meus-emprestimos')
        ->layout("layouts.usuario.app");
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
        
            $dadosPessoais = DadosPessoais::where("id_usuario", $id_usuario)->first();
            Historico::create([
                "id_usuario" => $id_usuario,
                "responsavel" => Auth::user()->id,
                "tema" => "Cancelamento de Empréstimo de dinheiro",
                "descricao" => "Foi cancelado o empréstimo de {$dadosPessoais->nome} {$dadosPessoais->sobrenome} ",
            ]);
        
        }else{
            $this->emit('alerta', ['mensagem' => 'Não tem nenhum valor emprestado', 'icon' => 'warning', 'tempo' => 3000]);
        }
    }
}

<?php

namespace App\Http\Livewire\Conta;

use App\Models\Conta;
use App\Models\DadosPessoais;
use App\Models\Historico;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class ListarContas extends Component
{
    public $listaGeral, $tipoConta;
    public $usuario, $dados, $acesso;

    public function mount(){
        $this->usuario = Auth::user();
        $this->dados = $this->usuario->buscarDadosPessoais;
        $this->acesso = $this->usuario->buscarAcesso;
    }

    public function render()
    {
        $this->listaGeral = User::join('contas', 'users.id', '=', 'contas.id_usuario')
            ->select('users.*', 'contas.*')
            ->get();
        return view('livewire.conta.listar-contas')
        ->layout("layouts.conta.app");
    }

    public function buscarTiposContaUsuario($id_usuario)
    {
        return Conta::where('id_usuario', $id_usuario)->get();
    }

    public function eliminarConta($id_usuario, $tipo)
    {
        if (isset($id_usuario) && isset($tipo)) {
            Conta::where('id_usuario', $id_usuario)
                ->where('tipo', $tipo)
                ->delete();
            $this->emit('alerta', ['mensagem' => 'Eliminado com sucesso', 'icon' => 'success']);
            $dadosPessoais = DadosPessoais::where("id_usuario", $id_usuario)->first();
            Historico::create([
                "id_usuario" => $id_usuario,
                "responsavel" => Auth::user()->id,
                "tema" => "Eliminação de conta",
                "descricao" => "Foi eliminado a conta {$tipo} de {$dadosPessoais->nome} {$dadosPessoais->sobrenome}",
            ]);
        }
    }
}

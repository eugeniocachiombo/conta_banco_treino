<?php

namespace App\Http\Livewire\Funcionario;

use App\Models\Agencia;
use App\Models\DadosPessoais;
use App\Models\Funcionario;
use App\Models\Historico;
use App\Models\Morada;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Lista extends Component
{
    public $funcionarios;
    public $usuario, $dados, $acesso;

    public function mount()
    {
        $this->usuario = Auth::user();
        $this->dados = $this->usuario->buscarDadosPessoais;
        $this->acesso = $this->usuario->buscarAcesso;
    }

    public function render()
    {
        $this->funcionarios = Funcionario::all();
        return view('livewire.funcionario.lista')->layout("layouts.usuario.app");
    }

    public function buscarMorada($id){
        return Morada::find($id);
    }

    public function buscarAgencia($id){
        return Agencia::find($id);
    }

    public function eliminarFuncionario($id){
        $funcionario = Funcionario::find($id);
        $funcionario->delete();
        $this->emit('alerta', ['mensagem' => 'Funcionário eliminado com sucesso', 'icon' => 'success', 'tempo' => 3000]);
    
        $dadosPessoais = DadosPessoais::where("id_usuario", $funcionario->id)->first();
        Historico::create([
            "id_usuario" => $funcionario->id,
            "responsavel" => Auth::user()->id,
            "tema" => "Remoção de Funcionários associados",
            "descricao" => "Foi removido dos Funcionários efectivos <<{$dadosPessoais->nome} {$dadosPessoais->sobrenome}>> no sytem-bank",
        ]);
    
    }
}

<?php

namespace App\Http\Livewire\Conta;

use App\Models\Conta;
use App\Models\DadosPessoais;
use App\Models\Historico;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class AdicionarContas extends Component
{
    public $listaGeral, $tipoConta;

    public function render()
    {
        $this->listaGeral = User::all();
        return view('livewire.conta.adicionar-contas');
    }

    public function buscarTiposContaUsuario($id_usuario)
    {
        return Conta::where('id_usuario', $id_usuario)->get();
    }

    public function adicionarConta($id_usuario){
        $ultimoRegistro = Conta::orderByDesc("id")->first();
        $novoNumConta = intval($ultimoRegistro->id . rand(1000,9999) . rand(1100,9999));
        Conta::create([
            "tipo" => $this->tipoConta,
            'num_conta' => $novoNumConta,
            'saldo' => 0.00,
            "id_usuario" => $id_usuario
        ]);
        $this->emit('alerta', ['mensagem' => 'Conta adicionada com sucesso', 'icon' => 'success']);
        $dadosPessoais = DadosPessoais::where("id_usuario", $id_usuario)->first();
        Historico::create([
        "id_usuario" => Auth::user()->id, 
        "tema" => "Adição de conta",
        "descricao" => "Adicionou uma nova conta {$this->tipoConta} para {$dadosPessoais->nome} {$dadosPessoais->sobrenome}"
    ]);
    }

    public function buscarContaEmFaltaUsuario($id_usuario)
    {
        $corrente = Conta::where('id_usuario', $id_usuario)->where("tipo", "corrente")->exists();
        $salario = Conta::where('id_usuario', $id_usuario)->where("tipo", "salario")->exists();

        if ($corrente) {
            return Conta::where("tipo", "!=", "corrente")->select("tipo")->distinct()->get();
        } elseif ($salario) {
            return Conta::where("tipo", "!=", "salario")->select("tipo")->distinct()->get();
        } else {
            return Conta::select("tipo")->distinct()->get();
        }
    }
}

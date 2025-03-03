<?php

namespace App\Http\Livewire\Cartao;

use App\Models\Cartao;
use App\Models\Conta;
use App\Models\DadosPessoais;
use App\Models\Historico;
use App\Models\User;
use DateTime;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Lista extends Component
{
    public $cartoes;

    public function render()
    {
        $this->cartoes = Cartao::all();
        return view('livewire.cartao.lista')->layout("layouts.usuario.app");
    }

    public function buscarUsuario($id_usuario)
    {
        return User::find($id_usuario);
    }

    public function buscarConta($id_conta)
    {
        return Conta::find($id_conta);
    }

    public function eliminarCartao($id)
    {
        $cartao = Cartao::find($id);
        $conta = Conta::find($cartao->id_conta);
        $cartao->delete();
        $this->emit('alerta', ['mensagem' => 'Cartão eliminado com sucesso', 'icon' => 'success', 'tempo' => 3000]);

        $dadosPessoais = DadosPessoais::where("id_usuario", $conta->id_usuario)->first();
        Historico::create([
            "id_usuario" => $conta->id_usuario,
            "responsavel" => Auth::user()->id,
            "tema" => "Eliminação de cartão",
            "descricao" => "Foi eliminado cartão do/a <<{$dadosPessoais->nome} {$dadosPessoais->sobrenome}>> na conta {$conta->tipo}",
        ]);

    }

    public function formatarData($data)
    {
        $dateTime = new DateTime($data);

        $meses = [
            1 => 'Jan',
            2 => 'Fev',
            3 => 'Mar',
            4 => 'Abr',
            5 => 'Mai',
            6 => 'Jun',
            7 => 'Jul',
            8 => 'Ago',
            9 => 'Set',
            10 => 'Out',
            11 => 'Nov',
            12 => 'Dez',
        ];

        $dia = $dateTime->format('j');
        $mes = $meses[(int) $dateTime->format('n')];
        $ano = $dateTime->format('Y');
        return "{$dia} de {$mes} de {$ano}";
    }
}

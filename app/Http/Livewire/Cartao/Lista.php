<?php

namespace App\Http\Livewire\Cartao;

use App\Models\Cartao;
use App\Models\Cliente;
use App\Models\Conta;
use App\Models\Funcionario;
use App\Models\User;
use DateTime;
use Livewire\Component;

class Lista extends Component
{
    public $cartoes;

    public function render()
    {
        $this->cartoes = Cartao::all();
        return view('livewire.cartao.lista');
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
        $cartao->delete();
        $this->emit('alerta', ['mensagem' => 'Cartão eliminado com sucesso', 'icon' => 'success', 'tempo' => 3000]);
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

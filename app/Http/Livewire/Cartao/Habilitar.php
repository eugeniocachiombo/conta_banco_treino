<?php

namespace App\Http\Livewire\Cartao;

use App\Models\Cartao;
use App\Models\Conta;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class Habilitar extends Component
{
    public $tipo, $estado, $id_conta, $id_usuario;
    public $contas, $usuarios;
    public $codSecreto;

    protected $rules = [
        'estado' => 'required',
        'tipo' => 'required',
        'id_conta' => 'required',
    ];

    protected $messages = [
        'estado.required' => 'Campo obrigatório',
        'id_conta.required' => 'Campo obrigatório',
        'tipo.required' => 'Campo obrigatório',
    ];

    public function render()
    {
        $this->usuarios = User::all();
        $this->contas = Conta::all();
        return view('livewire.cartao.habilitar');
    }

    public function habilitar()
    {
        $this->validate();
        $numero = rand(10102020, 98989898) + $this->id_usuario;
        $this->codSecreto = rand(1111, 9999);

        Cartao::create([
            "numero" => $numero,
            "codigo_seguranca" => Hash::make($this->codSecreto),
            "tipo" => $this->tipo,
            "emissao" => Carbon::now(),
            "validade" => Carbon::now()->addYears(4),
            "estado" => $this->estado,
            "id_conta" => $this->id_conta,
        ]);

        $this->emit('alerta', ['mensagem' => 'Cartão habilitado com sucesso', 'icon' => 'success', 'tempo' => 3000]);
        $this->limparCampos();
    }

    public function buscarUsuario($id_usuario)
    {
        return User::find($id_usuario);
    }

    public function selecionarConta($id_conta)
    {
        $conta = Conta::find($id_conta);
        $this->id_conta = $conta->id;
        $this->id_usuario = $conta->id_usuario;
    }

    public function limparCampos()
    {
        $this->tipo = $this->estado = $this->id_conta = $this->id_usuario = null;
    }
}

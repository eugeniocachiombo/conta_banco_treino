<?php

namespace App\Http\Livewire\Cliente;

use App\Models\Cliente;
use App\Models\Morada;
use App\Models\User;
use Livewire\Component;

class Cadastro extends Component
{
    public $listaGeral, $tipo, $salario, $nif, $morada, $id_usuario;
    public $verForm = false, $usuarios, $moradas;

    protected $rules = [
        'tipo' => 'required',
        'salario' => 'required',
        'nif' => 'required',
        'morada' => 'required',
    ];

    protected $messages = [
        'tipo.required' => 'Campo obrigatório',
        'salario.required' => 'Campo obrigatório',
        'nif.required' => 'Campo obrigatório',
        'morada.required' => 'Campo obrigatório',
    ];

    public function render()
    {
        $this->moradas = Morada::all();
        $this->usuarios = User::all();
        $this->listaGeral = User::join('contas', 'users.id', '=', 'contas.id_usuario')
            ->leftJoin("clientes", "clientes.id_usuario", "=", "users.id")
            ->select('users.*', 'contas.*')
            ->where("users.id_acesso", 3)
            ->whereNull("clientes.id_usuario")
            ->get();
        return view('livewire.cliente.cadastro');
    }

    public function cadastrar()
    {
        $this->validate();
        $salario = str_replace(",", ".", $this->salario);

        Cliente::create([
            "tipo" => $this->tipo,
            "salario" => $salario,
            "NIF" => $this->nif,
            "id_usuario" => $this->id_usuario,
            "id_morada" => $this->morada,
        ]);

        $this->emit('alerta', ['mensagem' => 'Cliente associado com sucesso', 'icon' => 'success', 'tempo' => 3000]);
    }

    public function tornarCliente($id)
    {
        $this->verForm = true;
        $this->id_usuario = $id;
    }

    public function limparCampos()
    {
        $this->listaGeral = $this->tipo = $this->salario = $this->nif = $this->morada = $this->id_usuario = null;
        $this->verForm = false;
        $this->usuarios = $this->moradas = null;
    }
}

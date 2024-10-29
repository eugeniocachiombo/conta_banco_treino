<?php

namespace App\Http\Livewire\Funcionario;

use App\Models\Agencia;
use App\Models\Funcionario;
use App\Models\Morada;
use App\Models\User;
use Livewire\Component;

class Cadastro extends Component
{
    public $listaGeral, $tipo, $salario, $agencia, $nif, $morada, $id_usuario;
    public $verForm = false, $nifExist = false, $usuarios, $moradas, $agencias;

    protected $rules = [
        'tipo' => 'required',
        'salario' => 'required',
        'agencia' => 'required',
        'nif' => 'required',
        'morada' => 'required',
    ];

    protected $messages = [
        'tipo.required' => 'Campo obrigatório',
        'salario.required' => 'Campo obrigatório',
        'agencia.required' => 'Campo obrigatório',
        'nif.required' => 'Campo obrigatório',
        'morada.required' => 'Campo obrigatório',
    ];

    public function render()
    {
        $this->agencias = Agencia::all();
        $this->moradas = Morada::all();
        $this->usuarios = User::all();
        $this->listaGeral = User::join('contas', 'users.id', '=', 'contas.id_usuario')
            ->leftJoin("funcionarios", "funcionarios.id_usuario", "=", "users.id")
            ->select('users.*', 'contas.*')
            ->where("users.id_acesso", 2)
            ->whereNull("funcionarios.id_usuario")
            ->get();
        return view('livewire.funcionario.cadastro');
    }

    public function cadastrar()
    {
        $this->validate();
        $salario = str_replace(",", ".", $this->salario);
        if (empty($this->nifExist)) {
            Funcionario::create([
                "tipo" => $this->tipo,
                "salario" => $salario,
                "id_agencia" => $this->agencia,
                "NIF" => $this->nif,
                "id_usuario" => $this->id_usuario,
                "id_morada" => $this->morada,
            ]);
            $this->emit('alerta', ['mensagem' => 'Funcionário associado com sucesso', 'icon' => 'success', 'tempo' => 3000]);
            $this->limparCampos();
        }
    }

    public function tornarfuncionario($id)
    {
        $this->verForm = true;
        $this->id_usuario = $id;
    }

    public function verificarNif()
    {
        $this->nifExist = null;
        $nif = Funcionario::where("nif", $this->nif)->first();
        if (!empty($nif)) {
            $this->nifExist = 'O NIF já existe';
        }
    }

    public function limparCampos()
    {
        $this->listaGeral = $this->agencia = $this->tipo = $this->salario = $this->nif = $this->morada = $this->id_usuario = null;
        $this->verForm = $this->nifExist = false;
        $this->usuarios = $this->agencias = $this->moradas = null;
    }
}

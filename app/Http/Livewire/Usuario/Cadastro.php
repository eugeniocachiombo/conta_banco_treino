<?php

namespace App\Http\Livewire\Usuario;

use App\Models\User;
use Livewire\Component;

class Cadastro extends Component
{
    public $nome, $sobrenome, $email, $telefone, $senha;

    public function render()
    {
        return view('livewire.usuario.cadastro');
    }

    public function cadastrar()
    {
        try {
            User::create([
                'name' => $this->nome . " " . $this->sobrenome,
                'email' => $this->email,
                'telefone' => $this->telefone,
                'password' => $this->senha,
            ]);
            $this->emit('alerta', ['mensagem' => 'Conta criada com sucesso', 'icon' => 'success']);
            $this->limparCampos();
        } catch (\Throwable $th) {
            $this->emit('alerta', ['mensagem' => 'Ocorreu um erro no cadastro', 'icon' => 'error']);
        }
    }

    public function verificarEmail()
    {
        $email = User::where("email", $this->email)->first();
        if (!empty($email)) {
            $this->emit('alerta', ['mensagem' => 'Email já existe', 'icon' => 'warning', 'tempo' => 3000]);
        }
    }

    public function verificarTelefone()
    {
        $telefone = User::where("telefone", $this->telefone)->first();
        if (!empty($telefone)) {
            $this->emit('alerta', ['mensagem' => 'Telefone já existe', 'icon' => 'warning', 'tempo' => 3000]);
        }
    }

    public function limparCampos()
    {
        $this->nome = $this->sobrenome = $this->email = $this->telefone = $this->senha = null;
    }
}

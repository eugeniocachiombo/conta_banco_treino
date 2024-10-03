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

    public function cadastrar(){
        $cadastro = User::create([
            'name' => $this->nome . " " . $this->sobrenome,
            'email' => $this->email,
            'telefone' => $this->telefone,
            'password' => $this->senha,
        ]);
        $this->emit('alerta', ['mensagem' => 'Estilo criado com sucesso', 'icon' => 'success']);
    }
}

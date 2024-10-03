<?php

namespace App\Http\Livewire\Usuario;

use Livewire\Component;

class Cadastro extends Component
{
    public $name, $email, $telefone, $password;

    public function render()
    {
        return view('livewire.usuario.cadastro');
    }

    public function cadastrar(){
        dd($this->name);
    }
}

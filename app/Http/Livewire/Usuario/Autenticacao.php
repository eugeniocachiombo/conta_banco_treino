<?php

namespace App\Http\Livewire\Usuario;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class Autenticacao extends Component
{
    public $telEmail, $senha;

    public function render()
    {
        return view('livewire.usuario.autenticacao');
    }

    public function logar()
    {
        $usuario = User::where('email', $this->telEmail)
            ->orWhere('telefone', $this->telEmail) 
            ->first();
        if ($usuario && Hash::check($this->senha, $usuario->password)) {
            Auth::login($usuario);
            return redirect()->route('usuario.index');
        } else {
            dd("Falha no login. Verifique suas credenciais.");
        }
    }

    public function limparCampos()
    {
        $this->telEmail = $this->senha = null;
    }
}

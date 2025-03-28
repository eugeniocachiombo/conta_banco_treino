<?php

namespace App\Http\Livewire\Usuario;

use App\Models\User;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class Autenticacao extends Component
{
    public $telEmail, $senha;

    public function render()
    {
        return view('livewire.usuario.autenticacao')
        ->layout("layouts.autenticacao.app");
    }

    public function logar()
    {
        try {
            $usuario = User::where('email', $this->telEmail)
                ->orWhere('telefone', $this->telEmail)
                ->first();
            if ($usuario && Hash::check($this->senha, $usuario->password)) {
                Auth::login($usuario);
                cookie("sessao_iniciada", "sessao_iniciada", 60);
                return redirect()->route('usuario.index');
            } else {
                $this->emit('alerta', ['mensagem' => 'Falha no login. Verifique suas credenciais', 'icon' => 'error', 'tempo' => 3000]);
            }
        } catch (QueryException $th) {
            $this->emit('alerta', ['mensagem' => 'Nenhuma conexão com a Base de dados', 'icon' => 'error', 'tempo' => 3000]);
        }
    }

    public function limparCampos()
    {
        $this->telEmail = $this->senha = null;
    }
}

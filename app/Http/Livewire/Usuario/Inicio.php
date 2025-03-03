<?php

namespace App\Http\Livewire\Usuario;

use App\Models\Acesso;
use App\Models\DadosPessoais;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Inicio extends Component
{
    public $usuario, $dados, $acesso;

    public function mount()
    {
        $this->usuario = Auth::user();
        $this->dados = $this->usuario->buscarDadosPessoais;
        $this->acesso = $this->usuario->buscarAcesso;
    }

    public function render()
    {
        return view('livewire.usuario.inicio')
            ->layout("layouts.usuario.app");
    }
}

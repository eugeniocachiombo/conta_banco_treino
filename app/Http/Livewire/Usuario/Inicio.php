<?php

namespace App\Http\Livewire\Usuario;

use Livewire\Component;

class Inicio extends Component
{
    public function render()
    {
        return view('livewire.usuario.inicio')
        ->layout("layouts.usuario.app");
    }
}

<?php

namespace App\Http\Livewire\Historico;

use App\Models\Conta;
use App\Models\DadosPessoais;
use App\Models\Historico;
use App\Models\User;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Lista extends Component
{
    public $historicos;
    
    public function render()
    {
        $this->historicos = Historico::where("id_usuario", Auth::user()->id)->get();
        return view('livewire.historico.lista');
    }

    public function imprimirComprovativo($idComprovativo){
        
        $pdf = Pdf::loadView('pdf.comprovativo');
        return response()->download(storage_path('app/public/comprovativo.pdf'));
    }

    public function buscarDadosPessoais($id_usuario)
    {
        return DadosPessoais::where("id_usuario", $id_usuario)->first();
    }

    public function buscarUsuario($id_usuario)
    {
        return User::find($id_usuario);
    }

    public function buscarConta($id_conta)
    {
        return Conta::find($id_conta);
    }
}

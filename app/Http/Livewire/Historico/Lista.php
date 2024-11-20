<?php

namespace App\Http\Livewire\Historico;

use App\Models\Conta;
use App\Models\DadosPessoais;
use App\Models\Historico;
use App\Models\User;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;
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

    public function imprimirComprovativo($idHistorico){
        $data = strval(Carbon::now());
        $data = str_replace(" ", "_", $data);
        $data = str_replace(":", "_", $data);
        $pdfPath = storage_path('app/public/comprovativo_'.$data.'.pdf');
        $historico = Historico::find($idHistorico);
        $pdf = Pdf::loadView('pdf.comprovativo', ["historico" => $historico]);
        $pdf->save($pdfPath);
        return response()->download($pdfPath);
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

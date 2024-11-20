<?php

namespace App\Http\Livewire\Acesso;

use App\Models\Acesso;
use App\Models\DadosPessoais;
use App\Models\Historico;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Livewire\Component;

class Modificar extends Component
{
    public $listaGeral, $acessos, $usarioIdAcesso;

    public function render()
    {
        $this->acessos = Acesso::all();
        $this->listaGeral = User::where("id_acesso", "!=", 1)->get();
        return view('livewire.acesso.modificar');
    }

    public function modificarAcesso($id_usuario){
        if($this->usarioIdAcesso != null){
            $dadosUsuario = DadosPessoais::where("id_usuario", $id_usuario)->first();
            $nomeCompleto = $dadosUsuario->nome . " " . $dadosUsuario->sobrenome;
            $acesso = Acesso::find($this->usarioIdAcesso);

            User::where("id", $id_usuario)->update(["id_acesso" => $this->usarioIdAcesso]);
            $this->emit('alerta', ['mensagem' => $nomeCompleto . ' adicionado como ' . $acesso->tipo, 'icon' => 'success', 'tempo'=>3000]);
            $dadosPessoais = DadosPessoais::where("id_usuario", $id_usuario)->first();
            Historico::create([
                "id_usuario" => $id_usuario,
                "responsavel" => Auth::user()->id,
                "tema" => "Modificação de Acesso de Conta",
                "descricao" => "Foi modificado o acesso de conta do/a {$dadosPessoais->nome} {$dadosPessoais->sobrenome} para {$acesso->tipo}",
            ]);
            return redirect()->route('acesso.modificar');
        }else{
            $this->emit('alerta', ['mensagem' => 'O acesso deve ser diferente do encontrado, escolha outro tipo de acesso', 'icon' => 'warning', 'tempo'=>4000]);
        }
        
    }
}

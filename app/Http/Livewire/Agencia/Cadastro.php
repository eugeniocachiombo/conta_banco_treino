<?php

namespace App\Http\Livewire\Agencia;

use App\Models\Agencia;
use App\Models\DadosPessoais;
use App\Models\Historico;
use App\Models\Morada;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Cadastro extends Component
{
    public $num_indent, $localizacao;
    public $localizacoes, $numIndentExist;

    protected $rules = [
        'localizacao' => 'required',
        'num_indent' => 'required'
    ];

    protected $messages = [
        'localizacao.required' => 'Campo obrigatório',
        'num_indent.required' => 'Campo obrigatório',
    ];

    public function render()
    {
        $this->localizacoes = Morada::all();
        return view('livewire.agencia.cadastro');
    }

    public function cadastrar()
    {
        $this->validate();

        if (empty($this->numIndentExist)) {
            Agencia::create([
                "localizacao" => $this->localizacao,
                "num_indent" => $this->num_indent,
            ]);
            $this->emit('alerta', ['mensagem' => 'Agência cadastrada com sucesso', 'icon' => 'success', 'tempo' => 3000]);
            
            Historico::create([
                "id_usuario" => Auth::user()->id,
                "responsavel" => Auth::user()->id,
                "tema" => "Cadastro de Agência",
                "descricao" => "Foi adicionado nova agência no sistema",
            ]);
            
            $this->limparCampos();
        }
    }

    public function verificarNumIndentExist()
    {
        $this->numIndentExist = null;
        $numIndentVericado = Agencia::where("num_indent", $this->num_indent)->first();

        if (!empty($numIndentVericado)) {
            $this->numIndentExist = 'O nº de indentificação já existe';
        }
    }

    public function limparCampos(){
         $this->num_indent = $this->localizacao = $this->numIndentExist = null;
    }
}

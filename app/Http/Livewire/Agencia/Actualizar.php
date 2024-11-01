<?php

namespace App\Http\Livewire\Agencia;

use App\Models\Agencia;
use App\Models\Morada;
use Livewire\Component;

class Actualizar extends Component
{
    public $id_agencia, $num_indent, $localizacao;
    public $localizacoes, $numIndentExist;

    protected $rules = [
        'localizacao' => 'required',
        'num_indent' => 'required',
    ];

    protected $messages = [
        'localizacao.required' => 'Campo obrigatório',
        'num_indent.required' => 'Campo obrigatório',
    ];

    public function mount($id)
    {
        $this->id_agencia = $id;
        $agencia = Agencia::find($this->id_agencia);
        $this->num_indent = $agencia->num_indent;
        $this->localizacao = $agencia->localizacao;
    }

    public function render()
    {
        $this->localizacoes = Morada::all();
        return view('livewire.agencia.actualizar');
    }

    public function actualizar()
    {
        $this->validate();

        if (empty($this->numIndentExist)) {
            Agencia::where("id", $this->id_agencia)->update([
                "localizacao" => $this->localizacao,
                "num_indent" => $this->num_indent,
            ]);
            $this->emit('alerta', ['mensagem' => 'Agência actualizada com sucesso', 'icon' => 'success', 'tempo' => 3000]);
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

    public function limparCampos()
    {
        $this->num_indent = $this->localizacao = $this->numIndentExist = null;
    }
}

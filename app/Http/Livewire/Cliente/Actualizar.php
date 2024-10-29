<?php

namespace App\Http\Livewire\Cliente;

use App\Models\Cliente;
use App\Models\Funcionario;
use App\Models\Morada;
use App\Models\User;
use Livewire\Component;

class Actualizar extends Component
{
    public $tipo, $salario, $nif, $morada, $id_usuario;
    public $nifExist, $usuarios, $moradas, $agencias;

    protected $rules = [
        'tipo' => 'required',
        'salario' => 'required',
        'nif' => 'required',
        'morada' => 'required',
    ];

    protected $messages = [
        'tipo.required' => 'Campo obrigatório',
        'salario.required' => 'Campo obrigatório',
        'nif.required' => 'Campo obrigatório',
        'morada.required' => 'Campo obrigatório',
    ];

    public function mount($id){
        $this->moradas = Morada::all();
        $this->usuarios = User::all();
        $this->id_usuario = $id;
        $cliente = Cliente::where("id_usuario", $id)->first();
        $this->tipo = $cliente->tipo; 
        $this->salario = $cliente->salario; 
        $this->nif = $cliente->nif; 
        $this->morada = $cliente->id_morada;
    }

    public function render()
    {
        return view('livewire.cliente.actualizar');
    }

    public function cadastrar()
    {
        $this->validate();
        $salario = str_replace(".", "", $this->salario);
        $salario1 = str_replace(",", ".", $salario);

        if (empty($this->nifExist)) {
            Cliente::where("id_usuario", $this->id_usuario)->update([
                "tipo" => $this->tipo,
                "salario" => $salario1,
                "nif" => $this->nif,
                "id_morada" => $this->morada,
            ]);
            $this->emit('alerta', ['mensagem' => 'Cliente actualizado com sucesso', 'icon' => 'success', 'tempo' => 3000]);
            redirect()->route("cliente.lista");
        }
    }

    public function verificarNif()
    {
        $this->nifExist = null;
        $nifFuncVericado = Funcionario::where("nif", $this->nif)->first();
        $nifClienteVericado = Cliente::where("nif", $this->nif)->first();

        if (!empty($nifFuncVericado) || !empty($nifClienteVericado)) {
            $this->nifExist = 'O NIF já existe';
        }
    }
}

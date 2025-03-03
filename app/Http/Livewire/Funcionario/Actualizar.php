<?php

namespace App\Http\Livewire\Funcionario;

use App\Models\Agencia;
use App\Models\Cliente;
use App\Models\Funcionario;
use App\Models\Morada;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Actualizar extends Component
{
    public $listaGeral, $tipo, $salario, $agencia, $nif, $morada, $id_usuario;
    public $verForm = false, $nifExist, $usuarios, $moradas, $agencias;
    public $usuario, $dados, $acesso;

    protected $rules = [
        'tipo' => 'required',
        'salario' => 'required',
        'agencia' => 'required',
        'nif' => 'required',
        'morada' => 'required',
    ];

    protected $messages = [
        'tipo.required' => 'Campo obrigatório',
        'salario.required' => 'Campo obrigatório',
        'agencia.required' => 'Campo obrigatório',
        'nif.required' => 'Campo obrigatório',
        'morada.required' => 'Campo obrigatório',
    ];

    public function mount($id){
        $this->usuario = Auth::user();
        $this->dados = $this->usuario->buscarDadosPessoais;
        $this->acesso = $this->usuario->buscarAcesso;

        $this->agencias = Agencia::all();
        $this->moradas = Morada::all();
        $this->usuarios = User::all();
        $this->id_usuario = $id;
        
        $funcionario = Funcionario::where("id_usuario", $id)->first();
        $this->tipo = $funcionario->tipo; 
        $this->salario = $funcionario->salario; 
        $this->agencia = $funcionario->id_agencia; 
        $this->nif = $funcionario->nif; 
        $this->morada = $funcionario->id_morada;
    }

    public function render()
    {
        return view('livewire.funcionario.actualizar')->layout("layouts.usuario.app");
    }

    public function cadastrar()
    {
        $this->validate();
        $salario = str_replace(".", "", $this->salario);
        $salario1 = str_replace(",", ".", $salario);

        if (empty($this->nifExist)) {
            Funcionario::where("id_usuario", $this->id_usuario)->update([
                "tipo" => $this->tipo,
                "salario" => $salario1,
                "nif" => $this->nif,
                "id_agencia" => $this->agencia,
                "id_morada" => $this->morada,
            ]);
            $this->emit('alerta', ['mensagem' => 'Funcionário actualizado com sucesso', 'icon' => 'success', 'tempo' => 3000]);
            redirect()->route("funcionario.lista");
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

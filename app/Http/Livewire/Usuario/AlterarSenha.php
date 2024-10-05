<?php

namespace App\Http\Livewire\Usuario;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class AlterarSenha extends Component
{
    public $senhaAntiga, $senhaNova,
    $confirmarSenha, $senhaConfErrada;

    protected $rules = [
        'senhaAntiga' => 'required|min:6',
        'senhaNova' => 'required|min:6',
        'confirmarSenha' => 'required|min:6',
    ];

    protected $messages = [
        'senhaAntiga.required' => 'Campo obrigatório',
        'senhaAntiga.min' => 'A senha deve conter pelo menos 6 digitos',
        'senhaNova.required' => 'Campo obrigatório',
        'senhaNova.min' => 'A senha deve conter pelo menos 6 digitos',
        'confirmarSenha.required' => 'Campo obrigatório',
        'confirmarSenha.min' => 'A senha deve conter pelo menos 6 digitos',
    ];

    public function render()
    {
        return view('livewire.usuario.alterar-senha');
    }

    public function alterarSenha()
    {
        $this->validate();
        if (!$this->verificarSenhaAntiga()) {
            $this->emit('alerta', ['mensagem' => 'Senha Antiga errada', 'icon' => 'error']);
        } else {
            $this->registrarNovaSenha();
        }
    }

    public function registrarNovaSenha()
    {
        if ($this->verificarNovaEConfirmar()) {
            User::where("id", Auth::user()->id)->update(["password" => Hash::make($this->senhaNova)]);
            $this->emit('alerta', ['mensagem' => 'Senha alterada com sucesso', 'icon' => 'success']);
            $this->limparCampos();
        }
    }

    public function verificarSenhaAntiga()
    {
        $usuario = Auth::user();
        return Hash::check($this->senhaAntiga, $usuario->password);
    }

    public function verificarNovaEConfirmar()
    {
        $this->senhaConfErrada = null;
        if ($this->senhaNova != $this->confirmarSenha && !empty($this->confirmarSenha)) {
            $this->senhaConfErrada = "A Senha Nova e a de Confirmar devem ser iguais";
            return false;
        } else {
            $this->senhaConfErrada = null;
            return true;
        }
    }

    public function limparCampos()
    {
        $this->senhaAntiga = $this->senhaNova = $this->confirmarSenha = $this->senhaConfErrada = null;
    }
}

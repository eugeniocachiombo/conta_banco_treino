<?php

namespace App\Http\Livewire\Usuario;

use App\Models\DadosPessoais;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class Cadastro extends Component
{
    public $nome, $sobrenome, $email, $telefone, $senha;
    public $nascimento, $genero;
    public $tlfExiste, $emailExist;

    protected $rules = [
        'nome' => 'required|min:3|regex:/^[A-Za-zÀ-ÿ\s]+$/',
        'sobrenome' => 'required|min:3|regex:/^[A-Za-zÀ-ÿ\s]+$/',
        'senha' => 'required|min:6',
        'telefone' => 'required|digits:9',
        'nascimento' => 'required|date|date_format:Y-m-d',
        'genero' => 'required',
        'email' => 'required|email',
    ];

    protected $messages = [
        'nome.required' => 'Campo obrigatório',
        'nome.min' => 'O nome de conter pelo menos 3 digitos',
        'nome.regex' => 'O nome deve conter apenas letras e espaços',
        'sobrenome.required' => 'Campo obrigatório',
        'sobrenome.min' => 'O sobrenome de conter pelo menos 3 digitos',
        'sobrenome.regex' => 'O sobrenome deve conter apenas letras e espaços',
        'senha.required' => 'Campo obrigatório',
        'senha.min' => 'A senha de conter pelo menos 6 digitos',
        'telefone.required' => 'Campo obrigatório',
        'telefone.digits' => 'O telefone deve ter exatamente 9 dígitos',
        'nascimento.required' => 'Campo obrigatório',
        'nascimento.date' => 'Data inválida',
        'nascimento.date_format' => 'Formato de data inválido',
        'genero.required' => 'Campo obrigatório',
        'email.required' => 'Campo obrigatório',
        'email.email' => 'Formato de email incorrecto',
    ];

    public function render()
    {
        return view('livewire.usuario.cadastro');
    }

    public function cadastrar()
    {
        $this->validate();
        try {
            $usuario = User::create([
                'name' => strtolower($this->nome) . "_" . strtolower($this->sobrenome),
                'email' => $this->email,
                'telefone' => $this->telefone,
                'password' => Hash::make($this->senha),
            ]);

            DadosPessoais::create([
                'nome' => $this->nome,
                'sobrenome' => $this->sobrenome,
                'nascimento' => $this->nascimento,
                'genero' => $this->genero,
                'id_usuario' => $usuario->id,
            ]);
            $this->emit('alerta', ['mensagem' => 'Conta criada com sucesso', 'icon' => 'success']);
            $this->limparCampos();
        } catch (\Throwable $th) {
            $this->emit('alerta', ['mensagem' => 'Ocorreu um erro no cadastro', 'icon' => 'error']);
        }
    }

    public function verificarEmail()
    {
        $this->emailExist = null;
        $email = User::where("email", $this->email)->first();
        if (!empty($email)) {
            $this->emailExist = 'O email já existe';
        }
    }

    public function verificarTelefone()
    {
        $this->tlfExiste = null;
        $telefone = User::where("telefone", $this->telefone)->first();
        if (!empty($telefone)) {
            $this->tlfExiste = 'O telefone já existe';
        }
    }

    public function limparCampos()
    {
        $this->nascimento = $this->genero = $this->tlfExiste = $this->emailExist = null;
        $this->nome = $this->sobrenome = $this->email = $this->telefone = $this->senha = null;
    }
}

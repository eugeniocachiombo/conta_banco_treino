<?php

namespace App\Http\Livewire\Usuario;

use App\Models\DadosPessoais;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class EditarDados extends Component
{
    public $usuarioLogado, $dadosPessoais;
    public $nome, $sobrenome, $email, $telefone, $senha;
    public $nascimento, $genero, $nacionalidade;
    public $tlfExiste, $emailExist;

    protected $rules = [
        'nome' => 'required|min:3|regex:/^[A-Za-zÀ-ÿ\s]+$/',
        'sobrenome' => 'required|min:3|regex:/^[A-Za-zÀ-ÿ\s]+$/',
        'telefone' => 'required|digits:9',
        'nascimento' => 'required|date|date_format:Y-m-d',
        'genero' => 'required',
        'nacionalidade' => 'required',
        'email' => 'required|email',
    ];

    protected $messages = [
        'nome.required' => 'Campo obrigatório',
        'nome.min' => 'O nome de conter pelo menos 3 digitos',
        'nome.regex' => 'O nome deve conter apenas letras e espaços',
        'sobrenome.required' => 'Campo obrigatório',
        'sobrenome.min' => 'O sobrenome de conter pelo menos 3 digitos',
        'sobrenome.regex' => 'O sobrenome deve conter apenas letras e espaços',
        'telefone.required' => 'Campo obrigatório',
        'telefone.digits' => 'O telefone deve ter exatamente 9 dígitos',
        'nascimento.required' => 'Campo obrigatório',
        'nascimento.date' => 'Data inválida',
        'nascimento.date_format' => 'Formato de data inválido',
        'genero.required' => 'Campo obrigatório',
        'nacionalidade.required' => 'Campo obrigatório',
        'email.required' => 'Campo obrigatório',
        'email.email' => 'Formato de email incorrecto',
    ];

    public function render()
    {
        return view('livewire.usuario.editar-dados');
    }

    public function mount(){
        $this->usuarioLogado = Auth::user();
        $this->email =  $this->usuarioLogado->email;
        $this->telefone = $this->usuarioLogado->telefone;

        $this->dadosPessoais = DadosPessoais::where('id_usuario', $this->usuarioLogado->id)->first();
        $this->nome = $this->dadosPessoais->nome;
        $this->sobrenome = $this->dadosPessoais->sobrenome;
        $this->nascimento = $this->dadosPessoais->nascimento;
        $this->genero = $this->dadosPessoais->genero;
        $this->nacionalidade = $this->dadosPessoais->nacionalidade;
    }

    public function actualizar()
    {
        $this->validate();
        try {
           User::where("id", $this->usuarioLogado->id)
           ->update([
                'name' => strtolower($this->nome) . "_" . strtolower($this->sobrenome),
                'email' => $this->email,
                'telefone' => $this->telefone
            ]);

            DadosPessoais::where("id_usuario", $this->usuarioLogado->id)
            ->update([
                'nome' => $this->nome,
                'sobrenome' => $this->sobrenome,
                'nascimento' => $this->nascimento,
                'genero' => $this->genero,
                'nacionalidade' => $this->nacionalidade,
            ]);
            $this->emit('alerta', ['mensagem' => 'Dados actualizados com sucesso', 'icon' => 'success']);
            $this->limparCampos();
        } catch (\Throwable $th) {
            $this->emit('alerta', ['mensagem' => 'Ocorreu um erro ao actualizar', 'icon' => 'error']);
        }
    }

    public function verificarEmail()
    {
        $this->emailExist = null;
        $email = User::where("email", $this->email)
        ->where("id", "!=", $this->usuarioLogado->id)
        ->first();
        if (!empty($email)) {
            $this->emailExist = 'O email já existe';
        }
    }

    public function verificarTelefone()
    {
        $this->tlfExiste = null;
        $telefone = User::where("telefone", $this->telefone)
        ->where("id", "!=", $this->usuarioLogado->id)
        ->first();
        if (!empty($telefone)) {
            $this->tlfExiste = 'O telefone já existe';
        }
    }

    public function limparCampos()
    {
        $this->usuarioLogado = $this->dadosPessoais = null;
        $this->nacionalidade = $this->nascimento = $this->genero = $this->tlfExiste = $this->emailExist = null;
        $this->nome = $this->sobrenome = $this->email = $this->telefone = $this->senha = null;
    }
}

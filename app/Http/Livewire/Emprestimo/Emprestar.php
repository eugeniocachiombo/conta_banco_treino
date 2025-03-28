<?php

namespace App\Http\Livewire\Emprestimo;

use App\Models\Conta;
use App\Models\DadosPessoais;
use App\Models\Emprestimo;
use App\Models\Historico;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Emprestar extends Component
{
    public $id_usuario, $dadosPessoais, $quantia,
    $contasUsuario, $tipoConta, $descricao;
    public $usuario, $dados, $acesso;

    protected $rules = [
        'tipoConta' => 'required',
        'quantia' => 'required',
        'descricao' => 'required',
    ];

    protected $messages = [
        'tipoConta.required' => 'Campo obrigatório',
        'quantia.required' => 'Campo obrigatório',
        'descricao.required' => 'Campo obrigatório',
    ];

    public function mount($id)
    {
        $this->id_usuario = $id;
        $this->usuario = Auth::user();
        $this->dados = $this->usuario->buscarDadosPessoais;
        $this->acesso = $this->usuario->buscarAcesso;
    }

    public function render()
    {
        $this->dadosPessoais = DadosPessoais::where("id_usuario", $this->id_usuario)->first();
        $this->contasUsuario = Conta::where("id_usuario", $this->id_usuario)->get();
        return view('livewire.emprestimo.emprestar')
        ->layout("layouts.usuario.app");
    }

    public function emprestar()
    {
        $this->validate();
        $conta = Conta::where("id_usuario", $this->id_usuario)
            ->where("id", $this->tipoConta)
            ->first();

        $saldoConta = $conta->saldo;
        $formatarQuantia1 = str_replace(".", "", $this->quantia);
        $formatarQuantia2 = str_replace(",", ".", $formatarQuantia1);
        $novoSaldo = $saldoConta + $formatarQuantia2;

        $emprestimoExiste = Emprestimo::where('id_usuario', $this->id_usuario)->first();

        if (!$emprestimoExiste) {
            Emprestimo::create([
                'descricao' => $this->descricao,
                'quantia' => $formatarQuantia2,
                'id_usuario' => $this->id_usuario,
                'id_conta' => $this->tipoConta,
            ]);
            $conta->update(["saldo" => $novoSaldo]);
            $this->emit('alerta', ['mensagem' => 'Dinheiro emprestado com sucesso', 'icon' => 'success', 'tempo' => 3000]);

            $dadosPessoais = DadosPessoais::where("id_usuario", $this->id_usuario)->first();
            Historico::create([
                "id_usuario" => $this->id_usuario,
                "responsavel" => Auth::user()->id,
                "tema" => "Empréstimo de dinheiro",
                "descricao" => "Foi emprestado {$this->quantia} kz na conta {$conta->tipo} de {$dadosPessoais->nome} {$dadosPessoais->sobrenome} ",
            ]);

            $this->quantia = $this->descricao = $this->tipoConta = null;
        } else {
            $this->emit('alerta', ['mensagem' => 'Já fizeste um empréstimo', 'icon' => 'error', 'tempo' => 3000]);
        }
    }
}

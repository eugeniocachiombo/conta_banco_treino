<?php

namespace App\Http\Livewire\Emprestimo;

use App\Models\Conta;
use App\Models\DadosPessoais;
use App\Models\Emprestimo;
use App\Models\Historico;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Devolver extends Component
{
    public $id_usuario, $dadosPessoais, $quantia,
    $contasUsuario, $tipoConta, $msgErroQuantia;
    public $usuario, $dados, $acesso;

    protected $rules = [
        'quantia' => 'required',
    ];

    protected $messages = [
        'quantia.required' => 'Campo obrigatório',
    ];

    public function mount($id)
    {
        $this->usuario = Auth::user();
        $this->dados = $this->usuario->buscarDadosPessoais;
        $this->acesso = $this->usuario->buscarAcesso;
        $this->id_usuario = $id;
        $emprestimo = Emprestimo::where('id_usuario', $this->id_usuario)->first();
        if ($emprestimo) {
            $this->tipoConta = $emprestimo->id_conta;
        }
    }

    public function render()
    {
        return view('livewire.emprestimo.devolver')
        ->layout("layouts.usuario.app");
    }

    public function devolver()
    {
        $this->validate();
        $conta = Conta::where("id_usuario", $this->id_usuario)
            ->where("id", $this->tipoConta)
            ->first();
        $emprestimo = Emprestimo::where('id_usuario', $this->id_usuario)->first();

        if ($emprestimo && $this->msgErroQuantia == null) {

            $formatarQuantia1 = str_replace(".", "", $this->quantia);
            $formatarQuantia2 = str_replace(",", ".", $formatarQuantia1);

            $conta->saldo -= $formatarQuantia2;
            $emprestimo->quantia -= $formatarQuantia2;

            $conta->save();
            $emprestimo->save();
            if ($emprestimo->quantia == 0) {
                $emprestimo->delete();
            }

            $this->emit('alerta', ['mensagem' => 'Dinheiro devolvido com sucesso', 'icon' => 'success', 'tempo' => 3000]);
            $dadosPessoais = DadosPessoais::where("id_usuario", $this->id_usuario)->first();
            Historico::create([
                "id_usuario" => $this->id_usuario,
                "responsavel" => Auth::user()->id,
                "tema" => "Devolução de dinheiro",
                "descricao" => "Foi devolvido {$this->quantia} kz emprestado por {$dadosPessoais->nome} {$dadosPessoais->sobrenome} para a conta {$conta->tipo}",
            ]);
            $this->quantia = $this->tipoConta = null;
        }
    }

    public function verificarExcessoQuantia()
    {
        $this->msgErroQuantia = null;
        $emprestimo = Emprestimo::where('id_usuario', $this->id_usuario)->first();

        if ($emprestimo) {
            $quantiaEmprestada = $emprestimo->quantia;
        }else{
            $this->msgErroQuantia = "Não tens nenhum empréstimo";
            return;
        }

        $formatarQuantia1 = str_replace(".", "", $this->quantia);
        $formatarQuantia2 = str_replace(",", ".", $formatarQuantia1);

        if ($formatarQuantia2 > $quantiaEmprestada) {
            $this->msgErroQuantia = "A quantia deve ser menor ou igual ao valor emprestado";
        }
    }
}

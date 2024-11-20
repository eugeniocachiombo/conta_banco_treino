<?php

namespace App\Http\Controllers\Cartao;

use App\Http\Controllers\Controller;
use App\Models\Cartao;
use App\Models\Conta;
use App\Models\DadosPessoais;
use App\Models\Historico;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class CartaoController extends Controller
{
    public function habilitar()
    {
        return view("cartao.habilitar");
    }

    public function listar()
    {
        return view("cartao.lista");
    }

    public function actualizar($id)
    {
        return view("cartao.actualizar", ["id" => $id]);
    }

    public function verificarCartao($num)
    {
        $cartao = Cartao::where("numero", $num)->first();
        $conta = $cartao ? Conta::find($cartao->id_conta) : null;
        $prorietario = $conta ? User::find($conta->id_usuario) : null;
        $dadosPessoais = $conta ? DadosPessoais::find($conta->id_usuario) : null;
        return response()->json([$cartao, $conta, $prorietario, $dadosPessoais]);
    }

    public function pagarComCartao($num, $codigo, $quantia, $descricao)
    {
        $aprovacao = $this->autenticarCartao($num, $codigo);
        if ($aprovacao) {
            $cartao = Cartao::where("numero", $num)->first();
            $conta = $cartao ? Conta::find($cartao->id_conta) : null;
            $comapatibildade = $conta ? $this->verificarSeSaldoEhCompativel($quantia, $conta->saldo) : null;
            $pagamento = $comapatibildade == "saldo e maior" ? $this->pagar($conta->id, $quantia) : null;
            $pagamento ? $this->registrarHistórico($conta->id_usuario, $quantia, $conta->tipo, $descricao) : "";
            return response()->json([$pagamento, $pagamento ? "Pagamento feito com sucesso" : "Saldo insuficiente"]);
        } else {
            return response()->json([$aprovacao, "Erro de aprovação, [Dados não encontrados]"]);
        }
    }

    public function registrarHistórico($id_usuario, $quantia, $tipoConta, $descricao)
    {
        $dadosPessoais = DadosPessoais::where("id_usuario", $id_usuario)->first();
        Historico::create([
            "id_usuario" => $id_usuario,
            "responsavel" => $id_usuario,
            "tema" => "Pagamento com o cartão",
            "descricao" => "Foi retirado na conta de {$dadosPessoais->nome} {$dadosPessoais->sobrenome} {$quantia} kz em conta {$tipoConta}. OBS: {$descricao}",
        ]);
    }

    public function autenticarCartao($num, $codigo)
    {
        $cartao = Cartao::where("numero", $num)->first();
        $aprovacao = Hash::check($codigo, $cartao->codigo_seguranca);
        return $aprovacao;
    }

    public function verificarSeSaldoEhCompativel($quantia, $saldo)
    {
        if ($saldo >= $quantia) {
            return "saldo e maior";
        } else {
            return "saldo e menor";
        }
    }

    public function pagar($idConta, $quantia)
    {
        $conta = Conta::find($idConta);
        Conta::where("id", $conta->id)->update([
            "saldo" => $conta->saldo - $quantia,
        ]);
        return true;
    }
}

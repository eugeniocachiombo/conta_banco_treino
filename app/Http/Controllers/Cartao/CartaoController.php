<?php

namespace App\Http\Controllers\Cartao;

use App\Http\Controllers\Controller;
use App\Http\Resources\CartaoResource;
use App\Models\Cartao;
use App\Models\Conta;
use App\Models\DadosPessoais;
use App\Models\Historico;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class CartaoController extends Controller
{
    public function show($num)
    {
        $cartao = Cartao::where("numero", $num)->first();
        $conta = $cartao ? Conta::find($cartao->id_conta) : null;
        $prorietario = $conta ? User::find($conta->id_usuario) : null;
        $dadosPessoais = $conta ? DadosPessoais::find($conta->id_usuario) : null;
        return new CartaoResource([$cartao, $conta, $prorietario, $dadosPessoais]);
    }

    public function store(Request $request){
        $num = $request->input("num"); 
        $codigo = $request->input("codigo"); 
        $quantia = $request->input("quantia"); 
        $descricao = $request->input("descricao");

        $aprovacao = $this->autenticarCartao($num, $codigo);
        if ($aprovacao) {
            $cartao = Cartao::where("numero", $num)->first();
            $conta = $cartao ? Conta::find($cartao->id_conta) : null;
            $compatibildade = $conta ? $this->verificarSeSaldoEhCompativel($quantia, $conta->saldo) : null;
            
            $pagamento = $compatibildade == "saldo e maior" ? $this->pagar($conta->id, $quantia) : null;
            $pagamento ? $this->registrarHistórico($conta->id_usuario, $quantia, $conta->tipo, $descricao) : "";
            return new CartaoResource([$pagamento, $pagamento ? "Pagamento feito com sucesso" : "Saldo insuficiente"]);
        } else {
            return new CartaoResource([$aprovacao, "Erro de aprovação, [Dados não encontrados]"]);
        }
    }

    public function registrarHistórico($id_usuario, $quantia, $tipoConta, $descricao)
    {
        $quantiaFormatada = number_format($quantia, 2, ',', '.');
        $dadosPessoais = DadosPessoais::where("id_usuario", $id_usuario)->first();
        Historico::create([
            "id_usuario" => $id_usuario,
            "responsavel" => $id_usuario,
            "tema" => "Pagamento com o cartão",
            "descricao" => "Foi retirado na conta de {$dadosPessoais->nome} {$dadosPessoais->sobrenome} {$quantiaFormatada} kz em conta {$tipoConta}. OBS: {$descricao}",
        ]);
    }

    public function autenticarCartao($num, $codigo)
    {
        $cartao = Cartao::where("numero", $num)->first();
        $aprovacao = Hash::check($codigo, $cartao->codigo_seguranca ?? '');
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
        $conta->saldo = $conta->saldo - $quantia;
        $conta->save();
        return true;
    }
}

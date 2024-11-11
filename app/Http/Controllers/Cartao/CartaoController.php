<?php

namespace App\Http\Controllers\Cartao;

use App\Http\Controllers\Controller;
use App\Models\Cartao;
use App\Models\Conta;
use App\Models\DadosPessoais;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class CartaoController extends Controller
{
    public function habilitar(){
        return view("cartao.habilitar");
    }

    public function listar(){
        return view("cartao.lista");
    }

    public function actualizar($id){
        return view("cartao.actualizar", ["id"=>$id]);
    }

    public function verificarCartao($num){
        $cartao = Cartao::where("numero", $num)->first();
        $conta = $cartao ? Conta::find($cartao->id_conta) : null;
        $prorietario = $conta ? User::find($conta->id_usuario) : null;
        $dadosPessoais = $conta ? DadosPessoais::find($conta->id_usuario) : null;
        return response()->json([$cartao, $conta, $prorietario, $dadosPessoais]);
    }

    public function pagarComCartao($num, $codigo, $quantia){
        $aprovacao = $this->autenticarCartao($num, $codigo);
        if ($aprovacao) {
            $cartao = Cartao::where("numero", $num)->first();
            $conta = $cartao ? Conta::find($cartao->id_conta) : null;
            $comapatibildade = $conta ? $this->verificarSeSaldoEhCompativel($quantia, $conta->saldo) : null;
            $pagamento = $comapatibildade == "saldo e maior" ? $this->pagar($conta->id, $quantia) : false;
            return response()->json([$pagamento, $pagamento ? "Pagamento feito com sucesso" : "Falha no pagamento"]);
        }else{
            return response()->json([$aprovacao, "Erro de aprovação"]);
        }
    }

    public function autenticarCartao($num, $codigo){
        $cartao = Cartao::where("numero", $num)->first();
        $aprovacao = Hash::check($codigo, $cartao->codigo_seguranca);
        return response()->json($aprovacao);
    }

    public function verificarSeSaldoEhCompativel($quantia, $saldo){
        if($saldo >= $quantia){
            return "saldo e maior";
        }else{
            return "saldo e menor";
        }
    }

    public function pagar($idConta, $quantia){
        $conta = Conta::find($idConta);
        Conta::where("id", $conta->id)->update([
           "saldo" => $conta->saldo - $quantia
        ]);
        return true;
    }
}

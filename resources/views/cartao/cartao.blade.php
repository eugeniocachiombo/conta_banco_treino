<div class="d-md-flex d-table text-start">
    <style>
        .cartao {
            min-width: inherit;
            height: 200px;
            background: linear-gradient(135deg, #0f2b47, #165ca1);
            color: white;
            border-radius: 15px;
            padding: 20px;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.3);
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            align-items: center;
            font-family: 'Arial', sans-serif;
            position: relative;
            margin-left: 300px;
        }

        .banco {
            text-align: center;
            margin-bottom: 10px;
        }

        .banco h2 {
            font-size: 1.5em;
            margin: 0;
            letter-spacing: 1px;
        }

        .numero-cartao {
            font-size: 1.8em;
            text-align: center;
            letter-spacing: 3px;
            margin: 10px 0;
        }

        .validade {
            font-size: 0.9em;
            position: absolute;
            bottom: 20px;
            right: 20px;
           /* background: rgba(255, 255, 255, 0.1);*/
            padding: 5px 10px;
            border-radius: 5px;
        }

        .chip {
            width: 50px;
            height: 30px;
            background: #FFD700;
            /* Amarelo */
            border-radius: 5px;
            position: absolute;
            top: 20px;
            left: 20px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.5);
            border: 1px solid #B0B0B0;
        }

        .chip::before,
        .chip::after {
            content: '';
            position: absolute;
            background: #B0B0B0;
        }

        .chip::before {
            width: 5px;
            height: 30%;
            left: 3px;
            top: 35%;
        }

        .chip::after {
            width: 5px;
            height: 30%;
            right: 3px;
            top: 35%;
        }
    </style>

    @php
        use App\Models\DadosPessoais;
        use App\Models\Acesso;
        use App\Models\Conta;
        use App\Models\Cartao;
        $usuario = Auth::user();
        $dados = DadosPessoais::where('id_usuario', $usuario->id)->first();
        $acesso = Acesso::find($usuario->id_acesso);
        $contas = Conta::where('id_usuario', $usuario->id)->get();
    @endphp

    @foreach ($contas as $conta)
        @php
            $cartao = Cartao::where('id_conta', $conta->id)->first();
        @endphp

        <div class="container d-flex justify-content-center">
            @if ($cartao)
                @php
                    $numero = $cartao->numero;
                    $numeroFormatado = substr($numero, 0, 3) . ' ' . substr($numero, 3, 3) . ' ' . substr($numero, 6);
                    $data = $cartao->validade; 
                    list($ano, $mes) = explode('-', $data);
                @endphp

                <div class="cartao m-2">
                    <div class="chip"></div>
                    <div class="banco ms-3">
                        <h2>System Bank</h2>
                    </div>

                    <div class="numero-cartao mb-4">
                        <h3>Ref {{ $numeroFormatado }}</h3>
                    </div>

                    <div class="validade mt-5 pb-2">
                        <span>Validade: {{$mes}}/{{$ano}}</span>
                    </div>

                    <div class="mt-4" style="font-size: 10px">
                        {{ $usuario->buscarDadosPessoais->nome }} {{ $usuario->buscarDadosPessoais->sobrenome }}
                    </div>
                </div>
            @endif
        </div>
    @endforeach

</div>

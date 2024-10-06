@include('inclusao.head')
@include('inclusao.header')
<title>Início</title>

@php
    use App\Models\DadosPessoais;
    use App\Models\Acesso;
    $usuario = Auth::user();
    $dados = DadosPessoais::where('id_usuario', $usuario->id)->first();
    $acesso = Acesso::find($usuario->id_acesso);
@endphp

<main class="p-4">
    <div class="container g-3 border " style="min-height: inherit">
        <div class="p-4 ">
            @include('inclusao.tag_usuario')

            <div class="container col-12 border mb-2">
                <h1>Dados Pessoais</h1>
                <p>Nome Completo: {{ $dados->nome }} {{ $dados->sobrenome }}</p>
                <p>Email: {{ $usuario->email }}</p>
                <p>Telefone: {{ $usuario->telefone }}</p>
            </div>

            <div class="mb-2">
                @include('cartao.cartao')
            </div>

            <div class="container col-12 border mb-2 pt-2">
                <h4>
                    <b class="d-table d-md-flex">
                        <i class="fas fa-bank pe-2"></i>
                        Saldo da conta:
                        @php
                            use App\Models\Conta;
                            $conta = Conta::where('id_usuario', $usuario->id)
                                ->where('tipo', 'corrente')
                                ->first();
                        @endphp

                        @if ($conta)
                            <div class="ps-md-2">{{ number_format($conta->saldo, 2, ',', '.') }} kz</div>
                        @else
                            <div class="ps-md-2">0,00 kz</div>
                        @endif
                    </b>
                </h4>
            </div>
        </div>
    </div>
</main>

@include('inclusao.footer')
@include('inclusao.foot')

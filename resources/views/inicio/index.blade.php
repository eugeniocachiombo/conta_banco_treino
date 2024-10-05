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
            <div class="d-table d-md-flex justify-content-between col-12 mb-2">
                <div class="col-md-4 col-12 d-flex justify-content-center align-items-center">
                    <div class="col-md-12 col-6 border mb-2 text-center" style="max-height: 150px; overflow: hidden;">
                        <i class="fas fa-user p-2" style="font-size: 100px"></i>
                        <!-- <a href="{{ asset('assets/img/logo.jpg') }}">
                            <img style="max-height: inherit; max-width: 175px; object-fit: cover;"
                                src="{{ asset('assets/img/logo.jpg') }}" class="img-fluid" alt="Não encontrado">
                        </a>
                    -->
                    </div>
                </div>

                <div class="col-md-4 col-12 d-flex flex-column justify-content-center align-items-center">
                    <div>
                        <h3>{{ $dados->nome }} {{ $dados->sobrenome }}</h3>
                    </div>
                    <div class="d-flex justify-content-start ">
                        {{ucwords($acesso->tipo)}}
                    </div>
                </div>

                <div class="col-md-4 col-12 d-flex justify-content-center align-items-center border">
                    <h3 class="pt-2" style="height: inherit"> <span class="saldo ">0,00</span>kz</h3>
                </div>
            </div>

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
                        <div class="ps-md-2"> <span class="saldo pe-2">0,00</span>kz</div>
                    </b>
                </h4>
            </div>
        </div>
    </div>
</main>

<script src="{{ asset('assets/js/calculoBancario.js') }}"></script>

@include('inclusao.footer')
@include('inclusao.foot')

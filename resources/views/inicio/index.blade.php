@include('inclusao.head')
@include('inclusao.header')
<title>Início</title>

<main class="p-4">
    <div class="container g-3 border " style="min-height: inherit">
        <div class="p-4 ">
            <div class="col-5 col-md-2 border mb-2 text-center" style="max-height: 150px; overflow: hidden;">
                <i class="fas fa-user p-2" style="font-size: 100px"></i>
                <!-- <a href="{{ asset('assets/img/logo.jpg') }}">
                    <img style="max-height: inherit; max-width: 175px; object-fit: cover;"
                        src="{{ asset('assets/img/logo.jpg') }}" class="img-fluid" alt="Não encontrado">
                </a>
            -->
            </div>

            <div class="container col-12 border mb-2">
                <h1>Dados Pessoais</h1>
                <p>Nome Completo: Eugénio Cachiombo</p>
                <p>Email: eugeniocachiombo@gmail.com</p>
                <p>Telefone: 921 XXX XXX</p>
            </div>

            <div class="container col-12 border mb-2 pt-2">
                <h4>
                    <b class="d-table d-md-flex">
                        <i class="fas fa-bank pe-2"></i> 
                        Saldo da conta: 
                        <div class="ps-md-2"> 1 000 000 00,kz</div>
                    </b>
                </h4>
            </div>

            <div>
                <a href="{{route('usuario.autenticacao')}}">
                    <button type="submit">
                        Terminar Sessão
                    </button>
                </a>
            </div>
        </div>
    </div>
</main>

@include('inclusao.footer')
@include('inclusao.foot')

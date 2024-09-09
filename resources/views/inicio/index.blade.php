@include('inclusao.head')
@include('inclusao.header')
<title>Início</title>

<main class="p-4">
    <div class="container g-3 border " style="min-height: inherit">
        <div class="p-4 ">
            <div class="col-2 border mb-2" style="max-height: 150px; overflow: hidden;">
                <a href="{{ asset('assets/img/logo.jpg') }}">
                    <img style="max-height: inherit; max-width: 175px; object-fit: cover;"
                        src="{{ asset('assets/img/logo.jpg') }}" class="img-fluid" alt="Não encontrado">
                </a>
            </div>

            <div class="container col-12 border mb-2">
                <h1>Dados Pessoais</h1>
                <p>Nome Completo: Eugénio Cachiombo</p>
                <p>Email: eugeniocachiombo@gmail.com</p>
                <p>Telefone: 921 XXX XXX</p>
            </div>

            <div class="container col-12 border mb-2 pt-2">
                <h4><i class="fas fa-bank pe-2"></i> <b>Saldo da conta: 1 000 000 00,kz</b></h4>
            </div>

            <div>
                <button type="submit">
                    Terminar Sessão
                </button>
            </div>
        </div>
    </div>
</main>

@include('inclusao.footer')
@include('inclusao.foot')

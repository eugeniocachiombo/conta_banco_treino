@include('inclusao.head')
@include('inclusao.header')
<title>Início</title>


<main>
    <div class="container g-3 border " style="min-height: inherit">
        <div class="p-4 ">
            <div class="col-2 border mb-2" style="min-height: 100px; ">
            <a href="{{ asset('assets/img/logotipo.jpg') }}">
                <img style="max-height: inherit; max-width: 175px; object-fit: cover" 
                src="{{ asset('assets/img/logotipo.jpg') }}" class="img-fluid" alt="Não encontrado">
            </a>   
            </div>

            <div class="container col-12 border mb-2">
                <h1>Dados Pessoais</h1>
                <p>Nome Completo: Eugénio</p>
                <p>Email: eugeniocachiombo@gmail.com</p>
                <p>Telefone: 921 XXX XXX</p>
            </div>

            <div class="container col-12 border mb-2 pt-2">
                <h4><b>Saldo da conta: 1 000 000 00,kz</b></h4>
            </div>
        </div>
    </div>
</main>


@include('inclusao.footer')
@include('inclusao.foot')

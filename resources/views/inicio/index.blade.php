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
                        <div class="ps-md-2"> <span class="saldo pe-2">0,00</span>kz</div>
                    </b>
                </h4>
            </div>

            <div>
                <label for=""><b>Quantia</b></label>
                <div class="col-9 col-md-6">
                    <input type="text" onkeydown="formatarValorNoCampo(this.value)" placeholder="Digite a quantia"
                        class="form-control" id="quantia">
                </div>
                <br>
                <button type="button" onclick="depositar()">
                    Depositar
                </button>

                <button class="mt-2" type="button" onclick="sacar()">
                    Sacar
                </button>
            </div>

            <div class="mt-4">
                <a href="{{ route('usuario.autenticacao') }}">
                    <button type="submit">
                        Terminar Sessão
                    </button>
                </a>
            </div>
        </div>
    </div>
</main> 

<script src="{{ asset('assets/js/calculoBancario.js') }}"></script>

@include('inclusao.footer')
@include('inclusao.foot')

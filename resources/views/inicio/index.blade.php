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
                <label for="">Quantia</label>
                <div class="col-6">
                    <input type="text" onkeydown="formatarValorNoCampo(this.value)" placeholder="Digite a quantia"
                        class="form-control" id="quantia">
                </div>
                <br>
                <button type="button" onclick="depositar()">
                    Depositar
                </button>

                <button type="button" onclick="sacar()">
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

<script>
    let saldo = document.querySelector(".saldo");
    let quantia = document.querySelector("#quantia");
    regraSaldo();

    function formatarValorNoCampo(valor) {
        $(document).ready(function() {
            $(quantia).mask('000.000.000.000.000,00', {
                reverse: true
            });
        });
    }

    function depositar() {
        let saldoAtual = parseFloat(saldo.innerText.replace(/\./g, '').replace(',', '.'));
        let valorDeposito = parseFloat(quantia.value.replace(/\./g, '').replace(',', '.'));

        let novoSaldo = saldoAtual + valorDeposito;
        let saldoFormatado = novoSaldo.toFixed(2);
        saldo.innerHTML = parseFloat(saldoFormatado).toLocaleString('pt-BR', {
            minimumFractionDigits: 2,
            maximumFractionDigits: 2
        });
        limparCampo();
    }

    function sacar() {
        let saldoAtual = parseFloat(saldo.innerText.replace(/\./g, '').replace(',', '.'));
        let valorSaque = parseFloat(quantia.value.replace(/\./g, '').replace(',', '.'));
        regraSaque(saldoAtual, valorSaque);
    }

    function limparCampo() {
        quantia.value = null;
    }

    function regraSaque(saldoAtual, valorSaque) {
        if (saldoAtual >= valorSaque) {
            let novoSaldo = saldoAtual - valorSaque;
            let saldoFormatado = novoSaldo.toFixed(2);
            saldo.innerHTML = parseFloat(saldoFormatado).toLocaleString('pt-BR', {
                minimumFractionDigits: 2,
                maximumFractionDigits: 2
            });
            limparCampo();
        } else {
            window.alert("Impossível Sacar");
        }
    }

    function regraSaldo(){
        $(document).ready(function() {
        if (saldo.innerText <= 0) {
            saldo.innerHTML = "0,00";
        }
    });
    }
</script>

@include('inclusao.footer')
@include('inclusao.foot')

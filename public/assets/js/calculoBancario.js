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

        if (valorDeposito > 0 ) {
            let novoSaldo = saldoAtual + valorDeposito;
            let saldoFormatado = novoSaldo.toFixed(2);
            saldo.innerHTML = parseFloat(saldoFormatado).toLocaleString('pt-BR', {
                minimumFractionDigits: 2,
                maximumFractionDigits: 2
            });
            limparCampo();
        }else{
            window.alert("Impossível Depositar");
        }
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

    function regraSaldo() {
        $(document).ready(function() {
            if (saldo.innerText <= 0) {
                saldo.innerHTML = "0,00";
            }
        });
    }
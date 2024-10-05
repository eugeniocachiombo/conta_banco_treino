
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
        @php
            use App\Models\Conta;
            $conta = Conta::where("id_usuario", $usuario->id)
            ->where("tipo", "corrente")
            ->first();
        @endphp
        <h3 class="pt-2" style="height: inherit"> {{number_format($conta->saldo, 2,',', '.');}} kz</h3>
    </div>
</div>
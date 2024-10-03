@include('inclusao.head')
@include('inclusao.header')
<title>Início</title>

@php
    use App\Models\DadosPessoais;
    $usuario = Auth::user();
    $dados = DadosPessoais::where("id_usuario", $usuario->id)->first();
@endphp

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
                <p>Nome Completo: {{$dados->nome}} {{$dados->sobrenome}}</p>
                <p>Email: {{$usuario->email}}</p>
                <p>Telefone: {{$usuario->telefone}}</p>
            </div>

            <div class="accordion accordion-flush mb-2" id="accordionFlushExample">
                <div class="accordion-item">
                    <h2 class="accordion-header" id="flush-headingOne">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#flush-collapseOne" aria-expanded="false"
                            aria-controls="flush-collapseOne">
                            <b>Contas</b>
                        </button>
                    </h2>
                    <div id="flush-collapseOne" class="accordion-collapse collapse"
                        aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
                        <div class="accordion-body">
                            
                        </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header" id="flush-headingTwo">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#flush-collapseTwo" aria-expanded="false"
                            aria-controls="flush-collapseTwo">
                            <b>Acessos</b>
                        </button>
                    </h2>
                    <div id="flush-collapseTwo" class="accordion-collapse collapse"
                        aria-labelledby="flush-headingTwo" data-bs-parent="#accordionFlushExample">
                        <div class="accordion-body">
                           
                        </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header" id="flush-headingThree">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#flush-collapseThree" aria-expanded="false"
                            aria-controls="flush-collapseThree">
                            <b>Transação</b>
                        </button>
                    </h2>
                    <div id="flush-collapseThree" class="accordion-collapse collapse"
                        aria-labelledby="flush-headingThree" data-bs-parent="#accordionFlushExample">
                        <div class="accordion-body">
                           
                        </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header" id="flush-headingFor">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#flush-collapseFor" aria-expanded="false"
                            aria-controls="flush-collapseThree">
                            <b>Empréstimo</b>
                        </button>
                    </h2>
                    <div id="flush-collapseFor" class="accordion-collapse collapse"
                        aria-labelledby="flush-headingThree" data-bs-parent="#accordionFlushExample">
                        <div class="accordion-body">
                           
                        </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header" id="flush-headingFor">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#flush-collapseFor" aria-expanded="false"
                            aria-controls="flush-collapseThree">
                            <b>Cliente</b>
                        </button>
                    </h2>
                    <div id="flush-collapseFor" class="accordion-collapse collapse"
                        aria-labelledby="flush-headingThree" data-bs-parent="#accordionFlushExample">
                        <div class="accordion-body">
                           
                        </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header" id="flush-headingFor">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#flush-collapseFor" aria-expanded="false"
                            aria-controls="flush-collapseThree">
                            <b>Funcionário</b>
                        </button>
                    </h2>
                    <div id="flush-collapseFor" class="accordion-collapse collapse"
                        aria-labelledby="flush-headingThree" data-bs-parent="#accordionFlushExample">
                        <div class="accordion-body">
                           
                        </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header" id="flush-headingFor">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#flush-collapseFor" aria-expanded="false"
                            aria-controls="flush-collapseThree">
                            <b>Agência</b>
                        </button>
                    </h2>
                    <div id="flush-collapseFor" class="accordion-collapse collapse"
                        aria-labelledby="flush-headingThree" data-bs-parent="#accordionFlushExample">
                        <div class="accordion-body">
                           
                        </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header" id="flush-headingFor">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#flush-collapseFor" aria-expanded="false"
                            aria-controls="flush-collapseThree">
                            <b>Morada</b>
                        </button>
                    </h2>
                    <div id="flush-collapseFor" class="accordion-collapse collapse"
                        aria-labelledby="flush-headingThree" data-bs-parent="#accordionFlushExample">
                        <div class="accordion-body">
                           
                        </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header" id="flush-headingFor">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#flush-collapseFor" aria-expanded="false"
                            aria-controls="flush-collapseThree">
                            <b>Cartão</b>
                        </button>
                    </h2>
                    <div id="flush-collapseFor" class="accordion-collapse collapse"
                        aria-labelledby="flush-headingThree" data-bs-parent="#accordionFlushExample">
                        <div class="accordion-body">
                           
                        </div>
                    </div>
                </div>
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

@section('titulo', 'Retirar Dinheiro')
<div class="container border mt-4 mb-4" >
    <div class="p-4 ">
        <div class="container col-12 border mb-2 text-white">
            <h1 class="text-center text-md-start pt-3 pb-4">Formulário de Retíro</h1>
            <div class="pb-5">
                <div class="col-12 ">
                    <form class="row d-flex justify-content-center" action="" method="get">
                        <div class="col-12 ">
                            <h1> <i class="fas fa-user"></i> {{ $this->dadosPessoais->nome }}
                                {{ $this->dadosPessoais->sobrenome }}</h1>
                        </div>

                        <div class="col-12 col-md-4">
                            <label for="">Conta</label> <br>
                            <select class="form-select" 
                            wire:change='escolherTipoConta'
                            wire:model="tipoConta">
                                <option class="d-none">Selecione</option>
                                @foreach ($this->contasUsuario as $item)
                                    <option value="{{ $item->id }}">{{ $item->tipo }}</option>
                                @endforeach
                            </select>

                            @if ($this->msgErroTipoConta != null)
                                <span class="error text-warning">{{ $this->msgErroTipoConta }}</span>
                            @else
                                @error('tipoConta')
                                    <span class="error text-warning">{{ $message }}</span>
                                @enderror
                            @endif
                        </div>

                        <div class="col-12 col-md-8 mb-3">
                            <label for="">Quantia do retíro</label>
                            <input style="min-height: 38px" class="form-control"
                                onkeydown="formatarCampoDinheiro(this.value)" type="text"
                                wire:keyup='verificarExcessoQuantia' id="quantia" required wire:model="quantia"
                                placeholder="Digite a quantia do retíro">

                            @if ($this->msgErroQuantia != null)
                                <span class="error text-warning">{{ $this->msgErroQuantia }}</span>
                            @else
                                @error('quantia')
                                    <span class="error text-warning">{{ $message }}</span>
                                @enderror
                            @endif

                            <script>
                                function formatarCampoDinheiro(valor) {
                                    $(document).ready(function() {
                                        $("#quantia").mask('000.000.000.000.000,00', {
                                            reverse: true
                                        });
                                    });
                                }
                            </script>
                        </div>
                    </form>
                </div>

                <div class="col-12 text-center text-md-start">
                    <span>
                        <button type="submit" wire:click.prevent='retirar'>
                            Retirar
                        </button> <br> <br>
                    </span>
                </div>
            </div>
        </div>
    </div>
</div>

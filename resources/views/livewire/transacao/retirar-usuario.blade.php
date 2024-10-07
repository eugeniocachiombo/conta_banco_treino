<div class="container g-3 border " style="min-height: inherit">
    <div class="p-4 ">
        <div class="container col-12 border mb-2">
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
                            <select class="form-select" wire:model="tipoConta">
                                <option class="d-none">Selecione</option>
                                @foreach ($this->contasUsuario as $item)
                                    <option value="{{ $item->id }}">{{ $item->tipo }}</option>
                                @endforeach
                            </select> <br>

                            @error('tipoConta')
                                <span class="error text-warning">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="col-12 col-md-8 mb-3">
                            <label for="">Quantia do retíro</label>
                            <input style="min-height: 38px" class="form-control" onkeydown="formatarCampoDinheiro(this.value)" type="text"
                                id="quantia" required wire:model="quantia" placeholder="Digite a quantia do retíro">

                            @error('quantia')
                                <span class="error text-warning">{{ $message }}</span>
                            @enderror

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
                        <button type="submit" wire:click.prevent='depositar'>
                            Retirar
                        </button> <br> <br>
                    </span>
                </div>
            </div>
        </div>
    </div>
</div>

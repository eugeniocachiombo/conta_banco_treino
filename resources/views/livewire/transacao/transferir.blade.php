<div class="container g-3 border " style="min-height: inherit">
    <div class="p-4 ">
        <div class="container col-12 border mb-2">
            <h1 class="text-center text-md-start pt-3 pb-4">Formulário de Transferência</h1>
            <div class="pb-5">
                <div class="col-12 ">
                    <form class="row d-flex justify-content-center" action="" method="get">
                        <div class="col-12 col-md-6 mb-3">
                            <label for="">Número da conta</label>
                            <input style="min-height: 38px" class="form-control"
                            wire:keydown="verificarContaExiste"
                             type="number" id="num_conta" required wire:model="num_conta">

                            @if ($this->msgErroNumConta != null)
                                <span class="error text-warning">{{ $this->msgErroNumConta }}</span>
                            @else
                                @error('num_conta')
                                    <span class="error text-warning">{{ $message }}</span>
                                @enderror
                            @endif
                        </div>

                        <div class="col-12 col-md-6 mb-3">
                            <label for="">Quantia da transferência</label>
                            <input style="min-height: 38px" class="form-control"
                                 type="text" id="quantia" required
                                 onkeydown="formatarCampoDinheiro(this.valor)"
                                wire:model="quantia" placeholder="Digite a quantia da transferência">

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
                        <button type="submit" wire:click.prevent='transferir'>
                            Transferir
                        </button> <br> <br>
                    </span>
                </div>
            </div>
        </div>
    </div>
</div>

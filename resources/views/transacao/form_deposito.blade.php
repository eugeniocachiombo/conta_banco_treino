<div class="pb-5">
    <div class="col-12 text-center text-md-start">
        <i class="fas fa-user text-center" style="font-size: 100px"></i>
        <h1>Formulário de Deposito</h1>
    </div>

    <div class="col-12 ">
        <form class="row g-3 d-table justify-content-center" action="" method="get">
            <div class="col-12 ">
                <h1> <i class="fas fa-user"></i> Eugenio Cachiombo</h1>
            </div>

            <div class="col-8 ">
                <label for="">Quantia do depósito</label>
                <input class="form-control" onkeydown="formatarCampoDinheiro(this.value)" type="text" id="quantia"
                    required wire:model="">

                {{--
                @if ($tlfExiste != null)
                    <span class="error text-warning">{{ $tlfExiste }}</span>
                @else 
                    @error('quantia')
                        <span class="error text-warning">{{ $message }}</span>
                    @enderror
                @endif --}}

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

    <div class="col-12 text-center text-md-start pt-4">
        <span>
            <button type="submit" wire:click.prevent='depositar'>
                Depositar
            </button> <br> <br>
        </span>
    </div>
</div>

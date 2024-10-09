@php
    use App\Models\DadosPessoais;
    use App\Models\Acesso;
    $usuario = Auth::user();
    $dados = DadosPessoais::where('id_usuario', $usuario->id)->first();
    $acesso = Acesso::find($usuario->id_acesso);
@endphp

<div class="container g-3 border " style="min-height: inherit">
    <div class="p-4 ">
        @include('inclusao.tag_usuario')

        <div class="container col-12 border mb-2">
            <h1 class="text-center text-md-start pt-3 pb-4">Formulário de Devolução</h1>
            <div class="pb-5">
                <div class="col-12 ">
                    <form class="row d-flex " action="" method="get">
                        <div class="col-12 col-md-4 mb-3">
                            <label for="">Quantia a devolver</label>
                            <input style="min-height: 38px" class="form-control"
                                onkeydown="formatarCampoDinheiro(this.value)" 
                                wire:keyup='verificarExcessoQuantia'
                                type="text" id="quantia" required
                                wire:model="quantia" placeholder="Digite a quantia do empréstimo">

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
                        <button type="submit" wire:click.prevent='devolver'>
                            Devolver
                        </button> <br> <br>
                    </span>
                </div>
            </div>
        </div>
    </div>
</div>

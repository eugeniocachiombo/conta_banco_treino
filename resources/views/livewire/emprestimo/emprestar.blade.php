@section('titulo', 'Lista de Empréstimos')
<div class="container g-3 border mb-4 mt-4" >
    <div class="p-4 ">
        @include('inclusao.tag_usuario')

        <div class="container col-12 border mb-2 text-white">
            <h1 class="text-center text-md-start pt-3 pb-4">Formulário de Empréstimo</h1>
            <div class="pb-5">
                <div class="col-12 ">
                    <form class="row d-flex justify-content-center" action="" method="get">
                        <div class="col-12 col-md-4">
                            <label for="">Conta</label> <br>
                            <select class="form-select" wire:model="tipoConta">
                                <option class="d-none">Selecione</option>
                                @foreach ($this->contasUsuario as $item)
                                    <option value="{{ $item->id }}">{{ $item->tipo }}</option>
                                @endforeach
                            </select>

                            @error('tipoConta')
                                <span class="error text-warning">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="col-12 col-md-4 mb-3">
                            <label for="">Quantia do empréstimo</label>
                            <input style="min-height: 38px" class="form-control" onkeydown="formatarCampoDinheiro(this.value)" type="text"
                                id="quantia" required wire:model="quantia" placeholder="Digite a quantia do empréstimo">

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

                        <div class="col-12 col-md-4 mb-3">
                            <label for="">Descrição</label>
                            <textarea style="min-height: 38px" class="form-control" 
                            type="text" cols="30" rows="1"
                            required wire:model="descricao" placeholder="Descrição do empréstimo"></textarea>

                            @error('descricao')
                                <span class="error text-warning">{{ $message }}</span>
                            @enderror
                        </div>
                    </form>
                </div>

                <div class="col-12 text-center text-md-start">
                    <span>
                        <button type="submit" wire:click.prevent='emprestar'>
                            Emprestar
                        </button> <br> <br>
                    </span>
                </div>
            </div>
        </div>
    </div>
</div>


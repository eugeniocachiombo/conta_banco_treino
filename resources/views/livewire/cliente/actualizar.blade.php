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
        <hr>

        <div class="container">
            <div class="row ">
                <div class="col-12 text-center text-md-start">
                    <h1>Actualizar Cliente</h1>
                </div>

                <div class="col-12 text-center text-md-start mb-5">
                    <i class="fas fa-user text-center" style="font-size: 100px"></i>
                    <div class="col-8 col-md-6 mt-2">
                        <select disabled class="form-select" id="" required wire:model="id_usuario">
                            <option class="d-none">Selecione</option>
                            @foreach ($usuarios as $usuario)
                                <option value="{{ $usuario->id }}">{{ $usuario->name }}</option>
                            @endforeach
                        </select>

                        @error('id_usuario')
                            <span class="error text-warning">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div class="col-12 ">
                    <form class="row g-3 d-flex justify-content-center" action="" method="get">
                        <div class="col-8 col-md-6 ">
                            <label for="">Tipo:</label>
                            <select class="form-select" id="" required wire:model="tipo">
                                <option class="d-none">Selecione</option>
                                <option value="fisico">Físico</option>
                                <option value="juridico">Jurídico</option>
                            </select>
                            @error('tipo')
                                <span class="error text-warning">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="col-12 col-md-6">
                            <label for="">Salário</label>
                            <input style="min-height: 38px" class="form-control"
                                onkeydown="formatarCampoDinheiro(this.value)" type="text" id="salario" required
                                wire:model="salario" placeholder="Exemplo: 12356,32">

                            @error('salario')
                                <span class="error text-warning">{{ $message }}</span>
                            @enderror

                            <script>
                                function formatarCampoDinheiro(valor) {
                                    $(document).ready(function() {
                                        $("#salario").mask('000.000.000.000.000,00', {
                                            reverse: true
                                        });
                                    });
                                }
                            </script>
                        </div>

                        <div class="col-8 col-md-6 ">
                            <label for="">NIF:</label>
                            <input class="form-control" type="nif" name="" id="" required
                                wire:model="nif" wire:keyup='verificarNif'>

                            @if ($nifExist != null)
                                <span class="error text-warning">{{ $nifExist }}</span>
                            @else
                                @error('nif')
                                    <span class="error text-warning">{{ $message }}</span>
                                @enderror
                            @endif
                        </div>

                        <div class="col-8 col-md-6 ">
                            <label for="">Morada</label>
                            <select class="form-select" id="" required wire:model="morada">
                                <option class="d-none">Selecione</option>
                                @foreach ($moradas as $morada)
                                    <option value="{{ $morada->id }}">{{ $morada->provincia }} :
                                        {{ $morada->endereco }}</option>
                                @endforeach
                            </select>

                            @error('morada')
                                <span class="error text-warning">{{ $message }}</span>
                            @enderror
                        </div>
                    </form>
                </div>

                <div class="col-12 text-center text-md-start pt-4">
                    <span>
                        <button type="submit" wire:click.prevent='cadastrar'>
                            Actualizar
                        </button>
                    </span>
                </div>
            </div>
        </div>
        <hr>
    </div>
</div>

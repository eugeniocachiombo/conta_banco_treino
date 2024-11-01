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
                        <h1>Cadastrar Agência</h1>
                    </div>

                    <div class="col-12 text-center text-md-start mb-5">
                        <form class="row g-3 d-flex justify-content-center" action="" method="get">
                         
                        <div class="col-8 col-md-6">
                            <label for="">Localização:</label>
                            <select class="form-select" id="" required wire:model="localizacao">
                                <option class="d-none">Selecione</option>
                                @foreach ($localizacoes as $localizacao)
                                    <option value="{{ $localizacao->id }}">{{ $localizacao->provincia }} : {{ $localizacao->endereco }}</option>
                                @endforeach
                            </select>

                            @error('localizacao')
                                <span class="error text-warning">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="col-8 col-md-6 ">
                            <label for="">Nº de Identificação:</label>
                            <input class="form-control" type="num_indent" name="" id="" required
                                wire:model="num_indent" wire:keyup='verificarNumIndentExist'>

                            @if ($numIndentExist != null)
                                <span class="error text-warning">{{ $numIndentExist }}</span>
                            @else
                                @error('num_indent')
                                    <span class="error text-warning">{{ $message }}</span>
                                @enderror
                            @endif
                        </div>
                        </form>
                    </div>

                    <div class="col-12 text-center text-md-start ">
                        <span>
                            <button type="submit" wire:click.prevent='cadastrar'>
                                Cadastrar
                            </button>
                        </span>
                    </div>
                </div>
            </div>
    </div>
</div>


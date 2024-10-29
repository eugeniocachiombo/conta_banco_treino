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

        @if ($verForm)
            <hr>
            <div class="container">
                <div class="row ">
                    <div class="col-12 text-center text-md-start">
                        <h1>Tornar Cliente</h1>
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
                                Cadastrar
                            </button>
                        </span>
                    </div>
                </div>
            </div>
            <hr>
        @endif

        <div class="container col-12 border mb-2">
            <h1 class="text-center text-md-start pt-3">Lista de Clientes Independentes</h1>
            <div class="col-12 ">
                <div class="table-responsive">
                    <table id="minhaTabela" class="table datatablePT table-hover pt-3">
                        <thead class="">
                            <tr>
                                <th class="bg-primary text-white" style="white-space: nowrap">
                                    Id
                                </th>

                                <th class="bg-primary text-white" style="white-space: nowrap">
                                    Nome Completo
                                </th>

                                <th class="bg-primary text-white" style="white-space: nowrap">
                                    Telefone
                                </th>

                                <th class="bg-primary text-white" style="white-space: nowrap">
                                    Acesso
                                </th>

                                <th class="bg-primary text-white text-center" style="white-space: nowrap">
                                    Número da Conta
                                </th>

                                <th class="bg-primary text-white" style="white-space: nowrap">
                                    Saldo da conta
                                </th>

                                <th class="bg-primary text-white text-center" style="white-space: nowrap">
                                    Tornar Cliente
                                </th>
                            </tr>
                        </thead>

                        <tbody class="text-white">

                            @foreach ($listaGeral as $item)
                                <tr class="text-white">
                                    <td>{{ $item->id }}</td>
                                    <td style="white-space: nowrap">{{ $item->buscarDadosPessoaisJoin->nome }}
                                        {{ $item->buscarDadosPessoaisJoin->sobrenome }}</td>
                                    <td>{{ $item->telefone }}</td>
                                    <td>{{ ucwords($item->buscarAcesso->tipo) }}</td>
                                    <td class="text-center"> {{ $item->num_conta }}</td>
                                    <td class="saldo">{{ number_format($item->saldo, 2, ',', '.') }} kz</td>
                                    <td class="text-center">
                                        <button class="bg-success" type="button"
                                            wire:click="tornarCliente({{ $item->id_usuario }})" style="width: 40px">
                                            <i class="fas fa-check"></i>
                                        </button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

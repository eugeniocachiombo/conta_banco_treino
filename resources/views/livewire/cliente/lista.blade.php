@section('titulo', 'Lista de Clientes')
<div class="container g-3 border mb-4 mt-4">
    <div class="p-4 ">
        @include('inclusao.tag_usuario')

        <div class="container col-12 border mb-2 text-white">
            <h1 class="text-center text-md-start pt-3 pb-4">Lista de Clientes</h1>

            <div class="col-12 ">
                <div class="table-responsive">
                    <table id="minhaTabela" class="table datatablePT table-hover pt-3">
                        <thead class="">
                            <tr>
                                <th class="bg-primary text-white" style="white-space: nowrap">
                                    Id
                                </th>

                                <th class="bg-primary text-white" style="white-space: nowrap">
                                    Usuário
                                </th>

                                <th class="bg-primary text-white" style="white-space: nowrap">
                                    Tipo
                                </th>

                                <th class="bg-primary text-white" style="white-space: nowrap">
                                    Salário
                                </th>

                                <th class="bg-primary text-white" style="white-space: nowrap">
                                    NIF
                                </th>

                                <th class="bg-primary text-white" style="white-space: nowrap">
                                    Morada
                                </th>

                                <th class="bg-primary text-white" style="white-space: nowrap">
                                    Acção
                                </th>
                            </tr>
                        </thead>

                        <tbody class="text-white">
                            @foreach ($clientes as $cliente)
                                @if (isset($cliente->buscarUsuario->buscarDadosPessoais))
                                    <tr class="text-white">
                                        <td>{{ $cliente->id }}</td>
                                        <td>{{ $cliente->buscarUsuario->buscarDadosPessoais->nome }}
                                            {{ $cliente->buscarUsuario->buscarDadosPessoais->sobrenome }}</td>
                                        <td>{{ ucwords($cliente->tipo) }}</td>
                                        <td>{{ number_format($cliente->salario, 2, ',', '.') }}</td>
                                        <td>{{ $cliente->nif }}</td>
                                        <td>{{ $cliente->buscarMorada->provincia }} :
                                            {{ $cliente->buscarMorada->endereco }} </td>
                                        <td class="text-center">
                                            <a href="{{ route('cliente.actualizar', $cliente->id_usuario) }}">
                                                <button class="bg-info" type="button" style="width: 40px">
                                                    <i class="fas fa-pen"></i>
                                                </button>
                                            </a>

                                            <button class="bg-danger" type="button"
                                                wire:click="eliminarCliente({{ $cliente->id }})" style="width: 40px">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </td>
                                    </tr>
                                @else
                                    <tr>
                                        <td colspan="7">
                                            Nenhuma informação encontrada
                                        </td>
                                    </tr>
                                @endif
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

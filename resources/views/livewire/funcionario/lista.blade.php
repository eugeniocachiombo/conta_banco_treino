@section('titulo', 'Lista de Funcionários')
<div class="container g-3 border mb-4 mt-4">
    <div class="p-4 ">
        @include('inclusao.tag_usuario')

        <div class="container col-12 border mb-2 text-white">
            <h1 class="text-center text-md-start pt-3 pb-4">Lista de Funcionários</h1>

            <div class="col-12 text-white">
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
                                    Agência
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
                            @foreach ($funcionarios as $funcionario)

                                <tr class="text-white">
                                    <td>{{ $funcionario->id }}</td>
                                    <td>{{ $funcionario->buscarUsuario->buscarDadosPessoais->nome }} {{ $funcionario->buscarUsuario->buscarDadosPessoais->sobrenome }}</td>
                                    <td>{{ $funcionario->buscarAgencia->num_indent }}</td>
                                    <td>{{ ucwords($funcionario->tipo) }}</td>
                                    <td>{{ number_format($funcionario->salario, 2, ",", ".") }}</td>
                                    <td>{{ $funcionario->nif }}</td>
                                    <td>{{ $funcionario->buscarMorada->provincia }} : {{ $funcionario->buscarMorada->endereco }} </td>
                                    <td class="text-center">
                                        <a href="{{route("funcionario.actualizar", $funcionario->id_usuario)}}">
                                            <button class="bg-info" type="button" style="width: 40px">
                                                <i class="fas fa-pen"></i>
                                            </button>
                                        </a>

                                        <button class="bg-danger" type="button"
                                            wire:click="eliminarFuncionario({{ $funcionario->id_usuario }})" style="width: 40px">
                                            <i class="fas fa-trash"></i>
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

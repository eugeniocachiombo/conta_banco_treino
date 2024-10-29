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
            <h1 class="text-center text-md-start pt-3 pb-4">Lista de Funcionários</h1>

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
                                    Eliminar
                                </th>
                            </tr>
                        </thead>

                        <tbody class="text-white">
                            @foreach ($funcionarios as $funcionario)
                                @php
                                    $agencia = $this->buscarAgencia($funcionario->id_agencia);
                                    $morada = $this->buscarMorada($funcionario->id_morada);
                                    $dadosPessoais = DadosPessoais::where('id_usuario', $funcionario->id_usuario)->first();
                                @endphp

                                <tr class="text-white">
                                    <td>{{ $funcionario->id }}</td>
                                    <td>{{ $dadosPessoais->nome }} {{ $dadosPessoais->sobrenome }}</td>
                                    <td>{{ $agencia->num_indent }}</td>
                                    <td>{{ ucwords($funcionario->tipo) }}</td>
                                    <td>{{ number_format($funcionario->salario, 2, ",", ".") }}</td>
                                    <td>{{ $funcionario->NIF }}</td>
                                    <td>{{ $morada->provincia }} : {{ $morada->endereco }} </td>
                                    <td class="text-center">
                                        <button class="bg-danger" type="button"
                                            wire:click="eliminarFuncionario({{ $funcionario->id }})" style="width: 40px">
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

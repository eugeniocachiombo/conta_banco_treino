@section('titulo', 'Lista de Empréstimos')
<div class="container g-3 border mb-4 mt-4" >
    <div class="p-4 ">
        @include('inclusao.tag_usuario')

        <div class="container col-12 border mb-2 text-white">
            <h1 class="text-center text-md-start pt-3 pb-4">Lista de Empréstimos</h1>

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
                                    Email
                                </th>

                                <th class="bg-primary text-white" style="white-space: nowrap">
                                    Telefone
                                </th>

                                <th class="bg-primary text-white" style="white-space: nowrap">
                                    Conta
                                </th>

                                <th class="bg-primary text-white" style="white-space: nowrap">
                                    Emprestimo
                                </th>

                                <th class="bg-primary text-white" style="white-space: nowrap">
                                    Cancelar
                                </th>
                            </tr>
                        </thead>

                        <tbody class="text-white">

                            @foreach ($listaGeral as $usuario)
                                <tr class="text-white">
                                    <td>{{ $usuario->id }}</td>
                                    <td>{{ $usuario->buscarDadosPessoais->nome }}
                                        {{ $usuario->buscarDadosPessoais->sobrenome }}</td>
                                    <td>{{ $usuario->email }}</td>
                                    <td>{{ $usuario->telefone }}</td>
                                    <td>{{ $usuario->buscarConta->tipo }}</td>
                                    <td>
                                        {{ $usuario->buscarEmprestimo($usuario->id) ? number_format($usuario->buscarEmprestimo($usuario->id)->quantia, 2, ',', '.') . ' kz' : '0,00 kz' }}
                                    </td>
                                    <td class="text-center">
                                        <button wire:click.prevent='cancelarEmprestimo({{ $usuario->id }}, {{$usuario->buscarConta->id}})'
                                            class="bg-danger" type="button" style="width: 40px">
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

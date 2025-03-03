@section('titulo', 'Listar Contas Bancárias')
<div class="container g-3 border mb-4 mt-4" >
    <div class="p-4 ">
        @include('inclusao.tag_usuario')

        <div class="container col-12 border mb-2 text-white">
            <h1 class="text-center text-md-start pt-3">Lista de contas bancárias</h1>

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
                                    Tipo de Conta
                                </th>

                                <th class="d-none bg-primary text-white text-center" style="white-space: nowrap">
                                    Eliminar Conta
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
                                        {{ ucwords($item->tipo) }}
                                    </td>
                                    <td class="d-none text-center">
                                        <button class="bg-danger" type="button"
                                            wire:click="eliminarConta({{ $item->id_usuario }}, '{{ $item->tipo }}')"
                                            style="width: 40px">
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

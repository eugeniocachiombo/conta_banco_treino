<div class="container g-3 border " style="min-height: inherit">
    <div class="p-4 ">
        <div class="container col-12 border mb-2">
            <h1 class="text-center text-md-start pt-3 pb-4">Depositar Dinheiro</h1>
            
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
                                    Acesso
                                </th>

                                <th class="bg-primary text-white" style="white-space: nowrap">
                                    Depositar
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
                                    <td>
                                        {{ ucwords($usuario->buscarAcesso->tipo) }}</option>
                                    </td>
                                    <td class="text-center">
                                        <a href="{{ route('transacao.depositar.usuario', $usuario->id) }}">
                                            <button class="bg-primary" type="button" style="width: 40px">
                                                <i class="fas fa-plus-circle"></i>
                                            </button>
                                        </a>
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

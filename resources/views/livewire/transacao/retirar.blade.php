@section('titulo', 'Retirar Dinheiro')
<div class="container border mt-4 mb-4" >
    <div class="p-4 ">
        <div class="container col-12 border mb-2 text-white">
            <h1 class="text-center text-md-start pt-3 pb-4">Retirar Dinheiro</h1>
            
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
                                    Retirar
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
                                        <a href="{{ route('transacao.retirar.usuario', $usuario->id) }}">
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

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
                                    Tipo
                                </th>

                                <th class="bg-primary text-white" style="white-space: nowrap">
                                    Salário
                                </th>

                                <th class="bg-primary text-white" style="white-space: nowrap">
                                    NIF
                                </th>

                                <th class="bg-primary text-white" style="white-space: nowrap">
                                    id_dados_pessoais
                                </th>

                                <th class="bg-primary text-white" style="white-space: nowrap">
                                    id_usuario
                                </th>

                                <th class="bg-primary text-white" style="white-space: nowrap">
                                    id_morada
                                </th>
                            </tr>
                        </thead>

                        <tbody class="text-white">
                            @foreach ($clientes as $cliente)
                                <tr class="text-white">
                                    <td>{{ $cliente->tipo }}</td>
                                    <td>{{ $cliente->salario }}</td>
                                    <td>{{ $cliente->NIF }}</td>
                                    <td>{{ $cliente->id_dados_pessoais }}</td>
                                    <td>{{ $cliente->id_usuario }}</td>
                                    <td>{{ $cliente->id_morada }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

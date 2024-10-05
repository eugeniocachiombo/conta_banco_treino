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
            <h1 class="text-center text-md-start pt-3">Listagem de contas bancárias</h1>

            <div class="col-12 ">
                <div class="table-responsive">
                    <table class="table datatablePT table-hover pt-3">
                        <thead class="">
                            <tr>
                                <th class="bg-primary text-white" style="white-space: nowrap">
                                    Id
                                </th>

                                <th class="bg-primary text-white" style="white-space: nowrap">
                                    Proprietário
                                </th>

                                <th class="bg-primary text-white" style="white-space: nowrap">
                                    Tipo de conta
                                </th>

                                <th class="bg-primary text-white" style="white-space: nowrap">
                                    Estado da conta
                                </th>

                                <th class="bg-primary text-white" style="white-space: nowrap">
                                    Saldo da conta
                                </th>
                            </tr>
                        </thead>

                        <tbody class="">
                            @forelse ($listaGeral as $item)
                                <tr class="text-white">
                                    <td>{{ $item->id }}</td>
                                    <td>{{ $item->id_usuario }}</td>
                                    <td>{{ ucwords($item->tipo) }}</td>
                                    <td>{{ ucwords($item->estado) }}</td>
                                    <td class="saldo">{{ number_format($item->saldo, 2, ',', '.') }} kz</td>
                                </tr>
                            @empty
                                <h1>Nenhuma informação encontrada</h1>
                            @endforelse

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

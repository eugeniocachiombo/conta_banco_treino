@section('titulo', 'Minhas Contas Bancária')
<div class="container g-3 border mt-4 mb-4" >
    <div class="p-4 ">
        @include('inclusao.tag_usuario')
        
        <div class="container col-12 border mb-2 text-white">
            <h1 class="text-center text-md-start pt-3">Minhas contas bancárias</h1>
            <div class="col-12 ">
                <div class="table-responsive">
                    <table id="minhaTabela" class="table datatablePT table-hover pt-3">
                        <thead class="">
                            <tr>
                                <th class="bg-primary text-white" style="white-space: nowrap">
                                    Id
                                </th>

                                <th class="bg-primary text-white" style="white-space: nowrap">
                                    Número da conta
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

                        <tbody class="text-white">
                            @foreach ($listaGeral as $item)
                                <tr class="text-white">
                                    <td>{{ $item->id }}</td>
                                    <td>{{ $item->num_conta }}</td>
                                    <td>{{ ucwords($item->tipo) }}</td>
                                    <td>{{ ucwords($item->estado) }}</td>
                                    <td class="saldo">{{ number_format($item->saldo, 2, ',', '.') }} kz</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

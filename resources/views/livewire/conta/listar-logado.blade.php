<div>
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
                <td>{{$item->id}}</td>
                <td>{{$item->id_usuario}}</td>
                <td>{{$item->tipo}}</td>
                <td>{{$item->estado}}</td>
                <td class="saldo">{{$item->saldo}}</td>
            </tr>
            @empty
                <h1>Nenhuma informação encontrada</h1>
            @endforelse
                
        </tbody>
    </table>
</div>
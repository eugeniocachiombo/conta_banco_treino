@section('titulo', 'Lista de Agências')
<div class="container border mt-4 mb-4" >
    <div class="p-4 ">
        @include('inclusao.tag_usuario')

        <div class="container col-12 border mb-2 text-white">
            <h1 class="text-center text-md-start pt-3 pb-4">Lista de agencias</h1>

            <div class="col-12 ">
                <div class="table-responsive">
                    <table id="minhaTabela" class="table datatablePT table-hover pt-3">
                        <thead class="">
                            <tr>
                                <th class="bg-primary text-white" style="white-space: nowrap">
                                    Id
                                </th>

                                <th class="bg-primary text-white" style="white-space: nowrap">
                                    Nº de Identificação
                                </th>

                                <th class="bg-primary text-white" style="white-space: nowrap">
                                    Localizacao
                                </th>

                                <th class="bg-primary text-white" style="white-space: nowrap">
                                    Acção
                                </th>
                            </tr>
                        </thead>

                        <tbody class="text-white">
                            @foreach ($agencias as $agencia)
                                @php
                                    $localizacao = $this->buscarLocalizacao($agencia->localizacao);
                                @endphp
                                <tr class="text-white">
                                    <td>{{ $agencia->id }}</td>
                                    <td>{{ $agencia->num_indent }}</td>
                                    <td>{{ $localizacao->provincia }} : {{ $localizacao->endereco }} </td>
                                    <td class="text-center">
                                        <a href="{{route("agencia.actualizar", $agencia->id)}}">
                                            <button class="bg-info" type="button" style="width: 40px">
                                                <i class="fas fa-pen"></i>
                                            </button>
                                        </a>

                                        <button class="bg-danger" type="button"
                                            wire:click="eliminarAgencia({{ $agencia->id }})" style="width: 40px">
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


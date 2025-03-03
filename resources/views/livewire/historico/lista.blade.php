@section('titulo', 'Históricos')
<div class="container border mt-4 mb-4" >
    <div class="p-4 text-white">
        <div class="container col-12 border mb-2 text-white">
            <h1>Históricos</h1>
        </div>
        <hr>

        <div class="col-12 ">
            <div class="table-responsive">
                <table id="minhaTabela" class="table datatablePT table-hover pt-3">
                    <thead class="">
                        <tr>
                            <th class="bg-primary text-white" style="white-space: nowrap">
                                Id
                            </th>

                            <th class="bg-primary text-white" style="white-space: nowrap">
                                Responsável
                            </th>

                            <th class="bg-primary text-white" style="white-space: nowrap">
                                Descrição
                            </th>

                            <th class="bg-primary text-white" style="white-space: nowrap">
                                Data
                            </th>

                            <th class="bg-primary text-white" style="white-space: nowrap">
                                Imprimir
                            </th>
                        </tr>
                    </thead>

                    <tbody class="text-white">

                        @foreach ($historicos as $historico)
                            @php
                                $usuario = $this->buscarUsuario($historico->id_usuario);
                                $dadosPessoais = $this->buscarDadosPessoais($historico->responsavel);
                            @endphp
                            
                                <tr class="text-white">
                                    <td>{{$historico->id}}</td>
                                    <td>{{ $dadosPessoais->nome  }} {{ $dadosPessoais->sobrenome  }}</td>
                                    <td>{{ $historico->descricao  }}</td>
                                    <td>{{ $historico->created_at  }}</td>
                                    <td class="text-center">
                                        <button class="bg-primary" type="button"
                                            wire:click="imprimirComprovativo({{$historico->id}})" style="width: 40px">
                                            <i class="fas fa-print"></i>
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

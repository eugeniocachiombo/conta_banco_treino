@section('titulo', 'Adicionar Contas Bancárias')
<div class="container g-3 border mb-4 mt-4" >
    <div class="p-4 ">
        @include('inclusao.tag_usuario')

        <div class="container col-12 border mb-2 text-white">
            <h1 class="text-center text-md-start pt-3">Adicionar contas bancárias</h1>

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
                                    Tipo de Conta
                                </th>

                                <th class="bg-primary text-white" style="white-space: nowrap">
                                    Adicionar
                                </th>
                            </tr>
                        </thead>

                        <tbody class="text-white">

                            @foreach ($listaGeral as $item)
                                @php
                                    $contas = $this->buscarTiposContaUsuario($item->id);
                                @endphp

                                @if (count($contas) < 2)
                                    <tr class="text-white">
                                        <td>{{ $item->id }}</td>
                                        <td>{{ $item->buscarDadosPessoais->nome }}
                                            {{ $item->buscarDadosPessoais->sobrenome }}</td>
                                        <td>{{ $item->email }}</td>
                                        <td>{{ $item->telefone }}</td>
                                        <td>{{ ucwords($item->buscarAcesso->tipo) }}</td>
                                        <td class="text-center">
                                            <select wire:model="tipoConta">
                                                <option class="d-none">Selecione</option>
                                                @foreach ($this->buscarContaEmFaltaUsuario($item->id) as $conta)
                                                    <option value="{{ $conta->tipo }}">{{ $conta->tipo }}</option>
                                                @endforeach
                                            </select>
                                        </td>
                                        <td class="text-center">
                                            <button class="bg-primary" type="button"
                                                wire:click="adicionarConta({{ $item->id }})" style="width: 40px">
                                                <i class="fas fa-plus"></i>
                                            </button>
                                        </td>
                                    </tr>
                                @endif
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

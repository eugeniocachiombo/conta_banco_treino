<div class="container g-3 border " style="min-height: inherit">
    <div class="p-4 ">

        <div class="col-12 text-center text-md-start">
            <h1>Lista de Cartões Habilitados</h1>
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
                                Nome Completo
                            </th>

                            <th class="bg-primary text-white" style="white-space: nowrap">
                                Número
                            </th>

                            <th class="bg-primary text-white" style="white-space: nowrap">
                                Tipo
                            </th>

                            <th class="bg-primary text-white text-center" style="white-space: nowrap">
                                Emissão
                            </th>

                            <th class="bg-primary text-white text-center" style="white-space: nowrap">
                                Tipo de conta
                            </th>

                            <th class="bg-primary text-white text-center" style="white-space: nowrap">
                                Validade
                            </th>

                            <th class="bg-primary text-white text-center" style="white-space: nowrap">
                                Estado
                            </th>

                            <th class="bg-primary text-white text-center" style="white-space: nowrap">
                                Eliminar Cartão
                            </th>
                        </tr>
                    </thead>

                    <tbody class="text-white">

                        @foreach ($cartoes as $cartao)
                        @php
                            $conta = $this->buscarConta($cartao->id_conta);
                            $usuario = $this->buscarUsuario($conta->id_usuario);
                        @endphp

                             <tr class="text-white">
                                <td>{{ $usuario->id }}</td>
                                <td style="white-space: nowrap">{{ $usuario->buscarDadosPessoais->nome }} {{ $usuario->buscarDadosPessoais->sobrenome }}</td>
                                <td>{{ $cartao->numero }}</td>
                                <td>{{ $cartao->tipo }}</td>
                                <td class="text-center" style="white-space: nowrap"> {{ $this->formatarData($cartao->emissao) }}</td>
                                <td class="text-center">
                                    {{ ucwords($conta->tipo) }}
                                </td>
                                <td class="text-center" style="white-space: nowrap"> {{ $this->formatarData($cartao->validade) }}</td>
                                <td>{{$cartao->estado}}</td>
                                <td class="text-center">
                                    <button class="bg-danger" type="button"
                                        wire:click="eliminarCartao({{ $cartao->id }})"
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

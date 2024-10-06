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
            <h1 class="text-center text-md-start pt-3">Lista de usuários e seus acessos</h1>

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
                                    Modificar
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
                                        <select wire:model="usarioIdAcesso">
                                            <option value="{{ $usuario->id_acesso }}" class="d-none">
                                                {{ ucwords($usuario->buscarAcesso->tipo) }}</option>

                                            @foreach ($this->acessos as $acesso)
                                                @if ($acesso->id != $usuario->id_acesso)
                                                    <option value="{{ $acesso->id }}">{{ ucwords($acesso->tipo) }}
                                                    </option>
                                                @endif
                                            @endforeach
                                        </select>
                                    </td>
                                    <td class="text-center">
                                        <button class="bg-primary" type="button"
                                            wire:click.prevent="modificarAcesso({{ $usuario->id }})"
                                            style="width: 40px">
                                            <i class="fas fa-pen"></i>
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

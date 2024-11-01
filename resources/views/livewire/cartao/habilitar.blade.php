<div class="container g-3 border " style="min-height: inherit">
    <div class="p-4 ">

        <div class="col-12 text-center text-md-start">
            <h1>Habilitar Cartão</h1>
        </div>

        @if ($formHabilitado)
            <hr>
            <div class="col-12 text-center text-md-start">
                <h1>Formulário de Habilitação</h1>
            </div>
            
            @if ($this->codSecreto && session('sucesso'))
                <di class="alert alert-info fw-bold mt-4 mb-5" style="font-size: 30px">O código secreto é
                    {{ $this->codSecreto }}</di>
            @endif

            <div class="container mt-3">
                <div class="row ">
                    <div class="col-12 text-center text-md-start mb-5">
                        <form class="row g-3 d-flex justify-content-center" action="" method="get">
                            <div class="col-8 col-md-6">
                                <label for=""><i class="fas fa-user"></i></label>
                                <select disabled class="form-select" id="" required wire:model="id_usuario">
                                    <option class="d-none">Selecione</option>
                                    @foreach ($usuarios as $usuario)
                                        <option value="{{ $usuario->id }}">{{ $usuario->buscarDadosPessoais->nome }}
                                            {{ $usuario->buscarDadosPessoais->sobrenome }} </option>
                                    @endforeach
                                </select>

                                @error('id_usuario')
                                    <span class="error text-warning">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="col-8 col-md-6">
                                <label for="">Conta:</label>
                                <select disabled class="form-select" id="" required wire:model="id_conta">
                                    <option class="d-none">Selecione</option>
                                    @foreach ($contas as $conta)
                                        <option value="{{ $conta->id }}">{{ $conta->tipo }} </option>
                                    @endforeach
                                </select>

                                @error('id_conta')
                                    <span class="error text-warning">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="col-8 col-md-6">
                                <label for="">Tipo:</label>
                                <select class="form-select" id="" required wire:model="tipo">
                                    <option class="d-none">Selecione</option>
                                    <option value="credito">Crédito</option>
                                    <option value="pagamento">Pagamento</option>
                                </select>

                                @error('tipo')
                                    <span class="error text-warning">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="col-8 col-md-6">
                                <label for="">Estado:</label>
                                <select class="form-select" id="" required wire:model="estado">
                                    <option class="d-none">Selecione</option>
                                    <option value="activo">Activo</option>
                                    <option value="inactivo">Inactivo</option>
                                    <option value="bloqueado">Bloqueado</option>
                                    {{--
                                <option value="cancelado">cancelado</option>
                                <option value="expirado">expirado</option>
                                --}}
                                </select>

                                @error('estado')
                                    <span class="error text-warning">{{ $message }}</span>
                                @enderror
                            </div>
                        </form>
                    </div>

                    <div class="col-12 text-center text-md-start ">
                        <span>
                            <button type="submit" wire:click.prevent='habilitar'>
                                Habilitar
                            </button>
                        </span>
                    </div>
                </div>
            </div>
        @endif

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
                                Acesso
                            </th>

                            <th class="bg-primary text-white" style="white-space: nowrap">
                                Telefone
                            </th>

                            <th class="bg-primary text-white text-center" style="white-space: nowrap">
                                Número da Conta
                            </th>

                            <th class="bg-primary text-white text-center" style="white-space: nowrap">
                                Tipo de conta
                            </th>

                            <th class="bg-primary text-white text-center" style="white-space: nowrap">
                                Habilitar Cartão
                            </th>
                        </tr>
                    </thead>

                    <tbody class="text-white">

                        @foreach ($contas as $conta)
                            @php
                                $usuario = $this->buscarUsuario($conta->id_usuario);
                            @endphp

                            <tr class="text-white">
                                <td>{{ $usuario->id }}</td>
                                <td style="white-space: nowrap">{{ $usuario->buscarDadosPessoais->nome }}
                                    {{ $usuario->buscarDadosPessoais->sobrenome }}</td>
                                <td>{{ ucwords($usuario->buscarAcesso->tipo) }}</td>
                                <td>{{ $usuario->telefone }}</td>
                                <td class="text-center"> {{ $conta->num_conta }}</td>
                                <td class="text-center">
                                    {{ ucwords($conta->tipo) }}
                                </td>
                                <td class="text-center">
                                    <button class="bg-info" type="button"
                                        wire:click="selecionarConta({{ $conta->id }})" style="width: 40px">
                                        <i class="fas fa-check"></i>
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

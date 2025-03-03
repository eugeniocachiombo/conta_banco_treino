<div class="container g-3 border mt-4 mb-4" style="min-height: inherit">
    <div class="p-4 ">
        @include('inclusao.tag_usuario')
        <div class="container border formulario pt-3 d-flex justify-content-center align-items-center text-light"
            style="min-height: inherit">
            <div class="row ">
                <div class="col-12 text-center text-md-start">
                    <i class="fas fa-user text-center" style="font-size: 100px"></i>
                    <h1>Editar Dados da Conta</h1>
                </div>

                <div class="col-12 ">
                    <form class="row g-3 d-flex justify-content-center" action="" method="get">
                        <div class="col-8 col-md-6 ">
                            <label for="">Nome:</label>
                            <input class="form-control" type="nome" name="" id="" required
                                wire:model="nome">
                            @error('nome')
                                <span class="error text-warning">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="col-8 col-md-6 ">
                            <label for="">Sobrenome:</label>
                            <input class="form-control" type="sobrenome" name="" id="" required
                                wire:model="sobrenome">
                            @error('sobrenome')
                                <span class="error text-warning">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="col-8 col-md-6 ">
                            <label for="">Email</label>
                            <input class="form-control" type="email" wire:keyup='verificarEmail' name=""
                                id="" required wire:model="email">
                            @if ($emailExist != null)
                                <span class="error text-warning">{{ $emailExist }}</span>
                            @else
                                @error('email')
                                    <span class="error text-warning">{{ $message }}</span>
                                @enderror
                            @endif
                        </div>

                        <div class="col-8 col-md-6 ">
                            <label for="">Telefone</label>
                            <input class="form-control" onkeydown="formatarCampoTelefone(this.value)" type="text"
                                maxlength="9" pattern="\d{9}" wire:keyup='verificarTelefone' name=""
                                id="telefone" required wire:model="telefone">

                            @if ($tlfExiste != null)
                                <span class="error text-warning">{{ $tlfExiste }}</span>
                            @else
                                @error('telefone')
                                    <span class="error text-warning">{{ $message }}</span>
                                @enderror
                            @endif

                            <script>
                                function formatarCampoTelefone(valor) {
                                    $(document).ready(function() {
                                        $('#telefone').mask('000000000', {
                                            reverse: true
                                        });
                                    });
                                }
                            </script>
                        </div>

                        <div class="col-8 col-md-6 ">
                            <label for="">Data de Nascimento:</label>
                            <input class="form-control" min="1940-10-10" max="2006-12-31" type="date" name=""
                                id="" required wire:model="nascimento">
                            @error('nascimento')
                                <span class="error text-warning">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="col-8 col-md-6 ">
                            <label for="">Gênero:</label>
                            <select class="form-select" wire:model="genero">
                                <option class="d-none">Seleccione</option>
                                <option value="M">Masculino</option>
                                <option value="F">Femenino</option>
                            </select>
                            @error('genero')
                                <span class="error text-warning">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="col-8 col-md-3 ">
                            <label for="">Nacionalidade:</label>
                            <select class="form-select" wire:model="nacionalidade">
                                <option class="d-none">Seleccione</option>
                                <option value="angola">Angolano</option>
                            </select>
                            @error('nacionalidade')
                                <span class="error text-warning">{{ $message }}</span>
                            @enderror
                        </div>
                    </form>
                </div>

                <div class="col-12 text-center text-md-center pt-4">
                    <span>
                        <button style="width: 200px" type="submit" wire:click.prevent='actualizar'>
                            Actualizar
                        </button> <br> <br>
                    </span>
                </div>
            </div>
        </div>
    </div>
</div>

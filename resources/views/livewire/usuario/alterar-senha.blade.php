@section('titulo', 'Alterar Senha')
<div class="container border mt-4 mb-4" >

    <div class="mt-4">
        @include('inclusao.tag_usuario')
    </div>

    <div class="container col-12 border text-white mt-4 mb-4">
        <h1 class="text-center pt-3 ">Alterar Senha</h1>
        <form class="row g-3 d-flex justify-content-center">
            <div class="col-8  ">
                <label for="">Senha Antiga:</label>
                <input class="form-control" type="password" name="" id="" wire:model="senhaAntiga">
                @error('senhaAntiga')
                    <span class="error text-warning">{{ $message }}</span>
                @enderror
            </div>

            <div class="col-8  ">
                <label for="">Senha Nova:</label>
                <input class="form-control" type="password" name="" id="" wire:model="senhaNova"
                    wire:keyup='verificarNovaEConfirmar'>
                @error('senhaNova')
                    <span class="error text-warning">{{ $message }}</span>
                @enderror
            </div>

            <div class="col-8  ">
                <label for="">Confirmar Senha:</label>
                <input class="form-control" type="password" name="" id="" wire:model="confirmarSenha"
                    wire:keyup='verificarNovaEConfirmar'>

                @if ($senhaConfErrada != null)
                    <span class="error text-warning">{{ $senhaConfErrada }}</span>
                @else
                    @error('confirmarSenha')
                        <span class="error text-warning">{{ $message }}</span>
                    @enderror
                @endif
            </div>

            <div class="col-8 text-center pt-4">
                <button style="width: 200px" type="submit" wire:click.prevent='alterarSenha'>
                    Alterar Senha
                </button> <br><br>
            </div>
        </form>
    </div>
</div>

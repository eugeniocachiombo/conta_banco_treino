@section('titulo', 'Autenticação')
<div class="container pt-3 formulario d-flex justify-content-center align-items-center text-light" style="min-height: inherit">
    <form class="row g-4 d-block justify-content-center" 
    wire:submit.prevent="logar" style="min-width: 50px">
        <i class="fas fa-bank text-center" style="font-size: 100px"></i>
        <h1 class="text-center">Autenticação</h1>

        <div class="col d-block justify-content-center">
            <label class="">Email ou Telefone:</label>
            <input class="form-control" type="text" wire:model='telEmail'> <br>

            <label class="">Senha:</label>
            <input class="form-control" type="password" wire:model='senha'>
        </div>

        <div class="text-center">
            <span>
                <button style="min-width: 320px">
                    Entrar
                </button> <br> <br>

                Ainda não tem uma conta?
                <a href="{{ route('usuario.cadastro') }}" style="color: white; font-wight: bold">Criar</a>
            </span>
        </div>
    </form>
</div>
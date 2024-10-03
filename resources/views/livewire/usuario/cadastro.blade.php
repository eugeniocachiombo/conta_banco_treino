<div class="container formulario d-flex justify-content-center align-items-center text-light" style="min-height: inherit">
    <div class="row ">
        <div class="col-12 text-center text-md-start">
            <i class="fas fa-user text-center" style="font-size: 100px"></i>
            <h1>Criar Conta</h1>
        </div>

        <div class="col-12 ">
            <form class="row g-3 d-flex justify-content-center" action="" method="get">
                <div class="col-8 col-md-6 ">
                    <label for="">Nome:</label>
                    <input class="form-control" type="nome" name="" id="" required wire:model="nome">
                </div>

                <div class="col-8 col-md-6 ">
                    <label for="">Sobrenome:</label>
                    <input class="form-control" type="sobrenome" name="" id="" required wire:model="sobrenome">
                </div>

                <div class="col-8 col-md-6 ">
                    <label for="">Email</label>
                    <input class="form-control" type="email" name="" id="" required wire:model="email">
                </div>

                <div class="col-8 col-md-6 ">
                    <label for="">Telefone</label>
                    <input class="form-control" type="number" name="" id="" required wire:model="telefone">
                </div>

                <div class="col-8 col-md-6 ">
                    <label for="">Senha:</label>
                    <input class="form-control" type="password" name="" id="" required wire:model="senha">
                </div>
            </form>
        </div>

        <div class="col-12 text-center text-md-start pt-4">
            <span>
                <button type="submit" wire:click='cadastrar'>
                    Criar
                </button> <br> <br>

                Já tem uma conta?
                <a href="{{ route('usuario.autenticacao') }}" style="color: white; font-wight: bold">Autenticar</a>
            </span>
        </div>
    </div>
</div>

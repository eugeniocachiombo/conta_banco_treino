@include('inclusao.head')
@include('inclusao.header')
<title>Alterar Senha</title>

@php
    use App\Models\DadosPessoais;
    use App\Models\Acesso;
    $usuario = Auth::user();
    $dados = DadosPessoais::where('id_usuario', $usuario->id)->first();
    $acesso = Acesso::find($usuario->id_acesso);
@endphp

<main class="p-4">
    <div class="container g-3 border " style="min-height: inherit">
        <div class="p-4 ">
            @include('inclusao.tag_usuario')

            <div class="container col-12 border mb-2">
                <h1 class="text-center text-md-start pt-3">Alterar Senha</h1>
                
                <div class="col-12 ">
                    <form class="row g-3 d-flex justify-content-center" action="" method="get">
                        <div class="col-8 col-md-4 ">
                            <label for="">Senha Antiga:</label>
                            <input class="form-control" type="password" name="" id="" required
                                wire:model="senhaAntiga">
                            @error('senhaAntiga')
                                <span class="error text-warning">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="col-8 col-md-4 ">
                            <label for="">Senha Nova:</label>
                            <input class="form-control" type="password" name="" id="" required
                                wire:model="senhaNova">
                            @error('senhaNova')
                                <span class="error text-warning">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="col-8 col-md-4 ">
                            <label for="">Confirmar Senha:</label>
                            <input class="form-control" type="password" name="" id="" required
                                wire:model="confirmarSenha">
                            @error('confirmarSenha')
                                <span class="error text-warning">{{ $message }}</span>
                            @enderror
                        </div>
                    </form>
                </div>

                <div class="col-12 text-center text-md-start pt-4">
                    <span class="col-4">
                        <button style="width: 200px" type="submit" wire:click.prevent='alterarSenha'>
                            Alterar Senha
                        </button> <br><br>
                    </span>
                </div>
            </div>
        </div>
    </div>
</main>

@include('inclusao.footer')
@include('inclusao.foot')

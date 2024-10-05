@include('inclusao.head')
@include('inclusao.header')
<title>Contas Lista</title>

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
                <h1 class="text-center text-md-start pt-3">Listagem de logado</h1>

                <div class="col-12 ">
                    @livewire('conta.listar-logado')
                </div>
            </div>
        </div>
    </div>
</main>

@include('inclusao.footer')
@include('inclusao.foot')

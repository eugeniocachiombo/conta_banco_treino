@include('inclusao.head')
@include('inclusao.header')
<title>Minhas Contas Bancária</title>

<main class="p-4">
    @livewire('conta.listar-logado')
</main>

@include('inclusao.footer')
@include('inclusao.foot')

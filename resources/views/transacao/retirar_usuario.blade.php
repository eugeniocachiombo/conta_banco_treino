@include('inclusao.head')
@include('inclusao.header')
<title>Retirar Dinheiro</title>

<main class="p-4">
   @livewire('transacao.retirar-usuario', ["id" => $id])
</main>

@include('inclusao.footer')
@include('inclusao.foot')
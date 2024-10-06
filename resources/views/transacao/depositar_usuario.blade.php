@include('inclusao.head')
@include('inclusao.header')
<title>Depositar Dinheiro</title>

<main class="p-4">
   @livewire('transacao.depositar-usuario', ["id" => $id])
</main>

@include('inclusao.footer')
@include('inclusao.foot')
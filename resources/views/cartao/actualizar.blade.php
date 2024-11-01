@include('inclusao.head')
@include('inclusao.header')
<title>Actualizar Cartão</title>

<main class="p-4">
   @livewire('cartao.actualizar', ["id" => $id])
</main>

@include('inclusao.footer')
@include('inclusao.foot')
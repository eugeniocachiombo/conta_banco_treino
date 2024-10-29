@include('inclusao.head')
@include('inclusao.header')
<title>Actualizar Cliente</title>

<main class="p-4">
   @livewire('cliente.actualizar', ["id" => $id])
</main>

@include('inclusao.footer')
@include('inclusao.foot')
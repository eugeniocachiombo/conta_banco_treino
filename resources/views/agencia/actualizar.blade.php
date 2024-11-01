@include('inclusao.head')
@include('inclusao.header')
<title>Actualizar Agência</title>

<main class="p-4">
   @livewire('agencia.actualizar', ["id" => $id])
</main>

@include('inclusao.footer')
@include('inclusao.foot')
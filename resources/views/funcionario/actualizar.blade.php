@include('inclusao.head')
@include('inclusao.header')
<title>Actualizar Funcionário</title>

<main class="p-4">
   @livewire('funcionario.actualizar', ["id" => $id])
</main>

@include('inclusao.footer')
@include('inclusao.foot')
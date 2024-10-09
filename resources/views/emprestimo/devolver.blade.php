@include('inclusao.head')
@include('inclusao.header')
<title>Devolver Dinheiro</title>

<main class="p-4">
   @livewire('emprestimo.devolver', ["id" => $id])
</main>

@include('inclusao.footer')
@include('inclusao.foot')
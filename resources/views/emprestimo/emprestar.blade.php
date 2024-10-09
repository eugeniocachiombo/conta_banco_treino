@include('inclusao.head')
@include('inclusao.header')
<title>Emprestar Dinheiro</title>

<main class="p-4">
   @livewire('emprestimo.emprestar', ["id" => $id])
</main>

@include('inclusao.footer')
@include('inclusao.foot')
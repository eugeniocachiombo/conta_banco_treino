@include('inclusao.head')
@include('inclusao.header')
<title>Listar Meus Empréstimos</title>

<main class="p-4">
   @livewire('emprestimo.lista-meus-emprestimos', ["id" => $id]) 
</main>

@include('inclusao.footer')
@include('inclusao.foot')
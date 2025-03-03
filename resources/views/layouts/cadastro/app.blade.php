<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="stylesheet" href="{{ asset('assets/bootstrap-5.0.2/css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/fontawesome/css/all5.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/fontawesome/css/all6.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/geral.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/formulario.css') }}">

    <script src="{{ asset('assets/bootstrap-5.0.2/js/bootstrap.js') }}"></script>
    <script src="{{ asset('assets/jquery/jquery.js') }}"></script>
    <script src="{{ asset('assets/jquery/jMask.js') }}"></script>
    <script src="{{ asset('assets/js/alerta.js') }}"></script>
    <script src="{{ asset('assets/js/executar_alert.js') }}"></script>

    <link rel="stylesheet" href="{{ asset('assets/css/jquery.dataTables.min.css') }}">
    {{-- <script src="{{ asset('assets/js/jquery-3.6.0.min.js') }}"></script> --}}
    <script src="{{ asset('assets/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/js/ellipsis.js') }}"></script>

    @livewireStyles
    
</head>

<body>
    
    {{ $slot }}

    <script>
        $(document).ready(function() {
            // Inicializar o DataTable com idioma em português
            var table = $('#minhaTabela').DataTable({
                language: {
                    "sEmptyTable": "Nenhum dado disponível na tabela",
                    "sInfo": "Mostrando de _START_ até _END_ de _TOTAL_ entradas",
                    "sInfoEmpty": "Mostrando 0 até 0 de 0 entradas",
                    "sInfoFiltered": "(filtrado de _MAX_ entradas totais)",
                    "sLengthMenu": "Mostrar _MENU_ entradas",
                    "sLoadingRecords": "Carregando...",
                    "sProcessing": "Processando...",
                    "sSearch": "Pesquisar:",
                    "sZeroRecords": "Nenhum registro encontrado",
                    "oPaginate": {
                        "sFirst": "Primeiro",
                        "sLast": "Último",
                        "sNext": "Próximo",
                        "sPrevious": "Anterior"
                    },
                    "oAria": {
                        "sSortAscending": ": ativar para classificar a coluna em ordem crescente",
                        "sSortDescending": ": ativar para classificar a coluna em ordem decrescente"
                    }
                }
            });

            // Função para adicionar uma nova linha
            $('#adicionarLinha').on('click', function() {
                var id = Math.floor(Math.random() * 100); // Exemplo de ID aleatório
                var nome = "Nome " + id; // Nome fictício
                var idade = Math.floor(Math.random() * 50) + 20; // Idade aleatória entre 20 e 70

                // Adicionar nova linha na tabela
                table.row.add([id, nome, idade]).draw();
            });
        });
    </script>
    @livewireScripts
</body>

</html>

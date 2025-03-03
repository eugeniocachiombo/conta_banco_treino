<script>
    $(document).ready(function() {
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

        $('#adicionarLinha').on('click', function() {
            var id = Math.floor(Math.random() * 100);
            var nome = "Nome " + id;
            var idade = Math.floor(Math.random() * 50) + 20;
            table.row.add([id, nome, idade]).draw();
        });
    });
</script>
@livewireScripts
</body>

</html>

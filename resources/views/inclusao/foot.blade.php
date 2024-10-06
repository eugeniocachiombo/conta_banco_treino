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
</body>

</html>

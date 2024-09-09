var nome;
var sobrenome;
var data;
var genero;
var nomePai;
var nomeMae;
var estadoSaude;
var nacionalidade;
var resultado;

nome = document.getElementById("nome");
sobrenome = document.getElementById("sobrenome");
data = document.getElementById("data");
genero = document.getElementById("genero");
nomePai = document.getElementById("nomePai");
nomeMae = document.getElementById("nomeMae");
estadoSaude = document.getElementById("estadoSaude");
nacionalidade = document.getElementById("nacionalidade");
resultado = document.getElementById("resultado");


function clicar(){
    resultado.innerHTML = "<table border='1'>"
            + "<tr>"
                + "<th> Nome </th>"
                + "<th> Sobrenome </th>"
                + "<th> Data </th>"
                + "<th> Gênero </th>"
                + "<th> Nome do pai </th>"
                + "<th> Nome da Mãe </th>"
                + "<th> Estado de Saúde </th>"
                + "<th> Nacionalidade </th>"
            + "</tr>"

            + "<tr>"
                + "<td>" + nome.value + "</td>"
                + "<td>" + sobrenome.value + "</td>"
                + "<td>" + data.value + "</td>"
                + "<td>" + genero.value + "</td>"
                + "<td>" + nomePai.value + "</td>"
                + "<td>" + nomeMae.value + "</td>"
                + "<td>" + estadoSaude.value + "</td>"
                + "<td>" + nacionalidade.value + "</td>"
            + "</tr>";
      + "</table>";
}

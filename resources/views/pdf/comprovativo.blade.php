<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fatura</title>
</head>

<body>
    @php
        use App\Models\Historico;
        use App\Models\DadosPessoais;
        use App\Models\User;

        $dadosPessoais = DadosPessoais::find($historico->id_usuario);
    @endphp

    <h1>{{$historico->tema}}</h1>
    <p>{{$historico->descricao}}</p>
    <p><b>Responsável:</b> {{$dadosPessoais->nome}} {{$dadosPessoais->sobrenome}}</p>
</body>

</html>

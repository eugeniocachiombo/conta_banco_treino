<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fatura</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Courier New', Courier, monospace;
        }

        html, body {
            height: 100%; 
            display: flex;
            flex-direction: column; 
            justify-content: space-between; 
            padding: 0 20px;
        }

        header {
            background: linear-gradient(45deg, rgb(85, 113, 165), rgb(185, 6, 147));
            color: white;
            padding: 15px 0;
            text-align: center;
            flex-shrink: 0; 
        }

        header b {
            font-size: 1.2em;
            font-weight: bold;
            text-transform: uppercase;
        }

        main {
            flex-grow: 1; 
            display: flex;
            justify-content: center;
            align-items: flex-start; 
            padding: 20px;
            background-color: #f9f9f9;
            text-align: center;
        }

        .container {
            width: 100%;
            max-width: 800px;
            text-align: left;
        }

        h1 {
            font-size: 2.5em;
            margin: 20px 0;
            color: #333;
            font-weight: bold;
            text-transform: uppercase;
        }

        p {
            font-size: 1.2em;
            margin-bottom: 20px;
            line-height: 1.6;
            color: #555;
        }

        b {
            font-weight: bold;
            color: #222;
        }

        hr {
            border: 1px solid #ddd;
            margin: 30px 0;
        }

        @media (max-width: 768px) {
            header, footer {
                padding: 10px;
            }

            h1 {
                font-size: 2em;
            }

            p {
                font-size: 1em;
            }
        }
    </style>
</head>

<body>
    <header>
        <div class="container" style="text-align: center">
            <b style="color: white">Sistema Banco - System Bank</b>
        </div>
    </header>

    <hr>

    <main>
        <div class="container">
            @php
                use App\Models\Historico;
                use App\Models\DadosPessoais;
                use App\Models\User;

                $dadosPessoais = DadosPessoais::find($historico->responsavel);
            @endphp

            <h1>{{ $historico->tema }}</h1>
            <p>{{ $historico->descricao }}</p>
            <p><b>Responsável:</b> {{ $dadosPessoais->nome }} {{ $dadosPessoais->sobrenome }}</p>
            <p><b>Data:</b> {{ $historico->created_at }}</p>
        </div>
    </main>

    <hr>

    <p><b>Comprovativo digital...</b></p>
    <p>Em caso de dúvidas, dirija-se ao nosso centro de atendimento.</p>
    <p><b>OBS:</b> Juntos! faremos um trabalho de alta qualidade.</p>
</body>

</html>

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
    <script src="{{ asset('assets/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/js/ellipsis.js') }}"></script>
    <title>@yield('titulo')</title>
    @livewireStyles
</head>
<body>
<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Dados do Emigrante</title>

    </head>
    <body>
        <a href="{{ route('home') }}">Voltar para index</a>
        <h3>Dados:</h3>
        <p>Nome: {{ $emigrante[0]['nome'] }}</p>
        <p>Data de Nascimento: {{ $emigrante[0]['dtNasc'] }}</p>
        <p>Nome do cônjuge: {{ $emigrante[0]['nomeConj'] }}</p>
        <h3>Filiação:</h3>
        <p>Pai: {{ $emigrante[0]['filiacao']['pai'] }}</p>
        <p>Mãe: {{ $emigrante[0]['filiacao']['mae'] }}</p>
        <h3>Naturalidade:</h3>
        <p>Freguesia: {{ $emigrante[0]['naturalidade']['freguesia'] }}</p>
        <p>Concelho: {{ $emigrante[0]['naturalidade']['concelho'] }}</p>
        <p>Distrito: {{ $emigrante[0]['naturalidade']['distrito'] }}</p>
        <p>Lugar: {{ $emigrante[0]['naturalidade']['lugar']['nome'] }}</p>
        <h3>Processos:</h3>
        @foreach($emigrante[0]['processos'] as $processo)
            <a href="{{ route('processo', ['id' => $processo['id']]) }}">{{ $processo['id'] }}</a>
        @endforeach
    </body>
</html>

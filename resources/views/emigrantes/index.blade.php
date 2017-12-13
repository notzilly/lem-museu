<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Lista de Emigrantes</title>

    </head>
    <body>
        <h2>Lista de Emigrantes</h2>
        <a href="{{ route('home') }}">Voltar para index</a>
        <ul>
            @foreach($emigrantes as $emigrante)
                <li><a href="{{ route('emigrantesShow', ['id' => $emigrante['id']]) }}">{{ $emigrante['nome'] }}</a></li>
            @endforeach
        </ul>
    </body>
</html>

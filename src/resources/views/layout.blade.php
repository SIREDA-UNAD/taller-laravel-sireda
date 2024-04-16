<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>
            @yield('title')
        </title>

        <style>
            body {
                margin: 0;
                font-family: system-ui;
            }
        </style>

    </head>
    <body>
        @if(auth()->check())
            <p>Autenticado como {{auth()->user()->nombre}}</p>
            <a href="{{route('logout')}}">Cerrar sesión</a>
        @endif
        @yield('content')
    </body>
</html>
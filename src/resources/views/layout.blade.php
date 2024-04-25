<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>
            @yield('title')
        </title>

        @vite(['resources/css/app.css'])
    </head>
    <body>
        @if(auth()->check())
            <div class="navbar">
                <div class="rutas">
                    <a href="{{route('inicio')}}">Inicio</a>
                    <a href="{{route('logout')}}">Cerrar sesión</a>
                </div>
                <div class="panel">
                    <p>Autenticado como {{auth()->user()->nombre}}</p>
                </div>
            </div>
        @endif
        <main>
            @yield('content')
        </main>
    </body>
</html>
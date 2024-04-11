<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Document</title>
    </head>
    <body>
        <h1>Listado de usuarios</h1>
        <table>
            <thead>
                <tr>
                    <th>#</th>
                    <th>Nombre</th>
                    <th>Correo</th>
                    <th>Puede postear</th>
                    <th>Puede crear usuarios</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($usuarios as $index => $usuario)
                    <tr>
                        <td>{{$index + 1}}</td>
                        <td>{{$usuario->nombre}}</td>
                        <td>{{$usuario->correo}}</td>
                        <td>{{$usuario->puede_postear == 1 ? 'Si' : 'No'}}</td>
                        <td>{{$usuario->puede_crear_usuario == 1 ? 'Si' : 'No'}}</td>
                        <td>TBD</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <form action="{{route('usuario.crear')}}" method="post">
            <h1>Crear usuario</h1>
            @csrf
            <label for="">Nombre:</label>
            <input type="text" name="nombre" required>
            <br/>
            <label for="">Correo:</label>
            <input type="email" name="correo" required>
            <br/>
            <label for="">Clave:</label>
            <input type="password" name="clave" required>
            <br/>
            <label for="">Puede postear:</label>
            <input type="checkbox" value="1" name="puede_postear">
            <br/>
            <label for="">Puede crear usuarios:</label>
            <input type="checkbox" value="1" name="puede_crear_usuario">
            <br/>
            <br/>
            <button type="submit">Crear</button>
        </form>
    </body>
</html>
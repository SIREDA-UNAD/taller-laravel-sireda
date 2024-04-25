@extends('layout')

@section('title', 'Listado de usuarios')

@section('content')
    <h1>Listado de usuarios</h1>

    <table>
        <thead>
            <tr>
                <th>#</th>
                <th>Nombre</th>
                <th>Correo</th>
                <th>Puede postear</th>
                <th>Puede crear usuarios</th>
                <th>Recibe notificaciones</th>
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
                    <td>{{$usuario->puede_crear_usuarios == 1 ? 'Si' : 'No'}}</td>
                    <td>{{$usuario->recibe_notificaciones == 1 ? 'Si' : 'No'}}</td>
                    <td>
                        <a class="button" href="{{route('usuario.editar', ['usuario' => $usuario->id])}}">Editar</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    @component('usuarios/formulario')
    @endcomponent
@endsection
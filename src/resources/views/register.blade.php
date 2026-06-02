@extends('layout')

@section('title', 'Registro')

@section('content')
    <form action="{{route('register.store')}}" method="post">

        <input name="correo" placeholder="Correo" autocomplete="off" required type="email" />
        <br/>
        <input name="nombre" placeholder="Nombre completo" autocomplete="off" required type="text" />
        <br/>
        <input name="clave" placeholder="Contraseña" autocomplete="off" required type="password" />
        <br/>
        <button type="submit">Registrarme</button>
    </form>
@endsection

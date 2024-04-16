@extends('layout')

@section('title', 'Iniciar sesión')

<form action="{{route('login')}}" method="post">
    @csrf
    <h1>Iniciar sesión</h1>

    <label for="">Correo electrónico:</label>
    <input type="email" name="correo" id="" required />
    <br/>
    <label for="">Contraseña:</label>
    <input type="password" name="clave" id="" required />
    <br/>
    <button type="submit">Iniciar sesión</button>
</form>
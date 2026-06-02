@extends('layout')

@section('content')

    <form enctype="multipart/form-data" method="post" action="{{route('register.validaciones.store')}}">
        @csrf
        <label>Ejemplo:</label>
        <input type="file" name="ejemplo">
        <button type="submit">Enviar</button>
    </form>

@endsection
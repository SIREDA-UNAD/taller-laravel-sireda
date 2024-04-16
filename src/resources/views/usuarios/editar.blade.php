@extends('layout')

@section('title', 'Edición de usuario')

@section('content')

    @component('usuarios.formulario')
        @slot('usuario', $usuario)
    @endcomponent

@endsection
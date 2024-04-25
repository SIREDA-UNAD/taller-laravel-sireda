@extends('layout')

@section('title', 'Inicio')

@section('content')

<br/>
<a href="{{route('usuario.listado')}}">Listado de usuarios</a>
<a href="{{route('post.listado')}}">Listado de posts</a>

@endsection
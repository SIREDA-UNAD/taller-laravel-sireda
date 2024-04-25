@extends('layout')

@section('titulo', $post?->titulo ?? '')

@section('content')

<h1>{{$post?->titulo ?? ''}}</h1>
<h4>Autor: {{$post?->creadoPor?->nombre ?? ''}} | Fecha de creación: {{$post?->created_at?->format('d/m/Y')}}</h4>
<hr>
<p>
    {{$post?->contenido ?? 'No hay contenido en este post.'}}
</p>

@endsection
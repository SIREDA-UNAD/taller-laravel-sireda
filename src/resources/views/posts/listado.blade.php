@extends('layout')

@section('title', 'Listado de posts')

@section('content')
    <h1>Listado de posts</h1>

    <table>
        <thead>
            <tr>
                <th>#</th>
                <th>Titulo</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($posts as $index => $post)
                <tr>
                    <td>{{$index + 1}}</td>
                    <td>{{$post?->titulo ?? ''}}</td>
                    <td>
                        <a class="button" href="{{route('post.editar', ['post' => $post->id])}}">Editar</a>
                        <a class="button" href="{{route('post.ver', ['post' => $post->id])}}">Ver</a>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="3">No hay posts</td>
                </tr>
            @endforelse
        </tbody>
    </table>
    @component('posts/formulario')
    @endcomponent
@endsection
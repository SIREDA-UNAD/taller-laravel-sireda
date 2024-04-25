@extends('layout')

@section('title', 'Edición de post')

@section('content')

    @component('posts.formulario')
        @slot('post', $post)
    @endcomponent

@endsection
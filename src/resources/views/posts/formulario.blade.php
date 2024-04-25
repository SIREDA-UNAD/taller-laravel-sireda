@php
    $post = $post ?? null;
    $ruta = $post ? 'post.actualizar' : 'post.crear';
    $nombreFormulario = $post ? 'Editar' : 'Crear';
    $parametros = $post ? ['post' => $post?->id] : [];
    $metodo = $post ? 'patch' : 'post';
@endphp
<form action="{{route($ruta, $parametros)}}" method="post">
    <h1>{{$nombreFormulario}} post</h1>
    @if(session('errors'))
        @php
            $errores = session('errors');
            $errores = $errores->all();
        @endphp
        <ul style="border: 1px solid red; color: red;">
            @foreach ($errores as $error)
                <li>{{$error}}</li>
            @endforeach
        </ul>
    @endif
    @csrf
    @method($metodo)
    <label for="">Título:</label>
    <input type="text" name="titulo" required value="{{$post?->titulo ?? ''}}">
    <br/>
    <label for="">Contenido:</label>
    <textarea name="contenido" required>{{$post?->contenido ?? ''}}</textarea>
    <br/>
    <br/>
    <button type="submit">{{$nombreFormulario}}</button>
    @if($post)
        <a class="button" href="{{route('post.listado')}}">Regresar</a>
    @endif
</form>
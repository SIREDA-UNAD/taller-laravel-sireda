@php
    $usuario = $usuario ?? null;
    $ruta = $usuario ? 'usuario.actualizar' : 'usuario.crear';
    $nombreFormulario = $usuario ? 'Editar' : 'Crear';
    $parametros = $usuario ? ['usuario' => $usuario?->id] : [];
    $metodo = $usuario ? 'patch' : 'post';
@endphp
<form action="{{route($ruta, $parametros)}}" method="post">
    <div class="container">
        <h1>{{$nombreFormulario}} usuario</h1>
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
        <label for="">Nombre:</label>
        <input type="text" name="nombre" required value="{{$usuario?->nombre ?? ''}}">
        <br/>
        <label for="">Correo:</label>
        <input type="text" name="correo" required value="{{$usuario?->correo ?? ''}}">
        <br/>
        @if(!$usuario)
            <label for="">Clave:</label>
            <input type="password" name="clave" required>
            <br/>
        @else
            <input type="hidden" name="id" value="{{$usuario?->id ?? ''}}" />
        @endif
        <div class="checkbox">
            <label for="">Puede postear:</label>
            <input type="checkbox" value="1" name="puede_postear" {{$usuario?->puede_postear ? 'checked' : ''}}>
            <br/>
        </div>
        <div class="checkbox">
            <label for="">Puede crear usuarios:</label>
            <input type="checkbox" value="1" name="puede_crear_usuario" {{$usuario?->puede_crear_usuario ? 'checked' : ''}}>
            <br/>
        </div>
        <div class="checkbox">
            <label for="">Recibe notificaciones:</label>
            <input type="checkbox" value="1" name="recibe_notificaciones" {{$usuario?->recibe_notificaciones ? 'checked' : ''}}>
            <br/>
        </div>
        <br/>
        <button type="submit">{{$nombreFormulario}}</button>
        @if($usuario)
            <a class="button" href="{{route('usuario.listado')}}">Regresar</a>
        @endif
    </div>
</form>
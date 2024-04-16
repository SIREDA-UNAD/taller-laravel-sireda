<?php

namespace App\Http\Controllers;

use App\Http\Requests\UsuarioRequest;
use App\Models\Usuario;

/**
 * Controlador de usuarios. Desde aquí se gestiona el CRUD de usuarios.
 */
class UsuarioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $usuarios = Usuario::all();
        $data = [
            'usuarios' => $usuarios
        ];
        return view('usuarios/listado', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(UsuarioRequest $request)
    {
        $datos = $request->all();
        $usuario = Usuario::create($datos);

        if (!$usuario) {
            return 'Error!';
        }

        return $this->index();
    }

    /**
     * Display the specified resource.
     */
    public function show(Usuario $usuario)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Usuario $usuario)
    {
        $datos = [
            'usuario' => $usuario
        ];
        return view('usuarios.editar', $datos);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UsuarioRequest $request, Usuario $usuario)
    {
        $datos = $request->all();
        $actualizado = $usuario->update($datos);

        if (!$actualizado) {
            return 'Error!';
        }

        return $this->index();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Usuario $usuario)
    {
        //
    }
}

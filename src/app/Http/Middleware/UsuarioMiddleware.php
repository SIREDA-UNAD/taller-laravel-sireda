<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

/**
 * Middleware que nos permite validar la información del usuario de manera genérica y sencilla.
 */
class UsuarioMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Verificamos que el usuario que se haya autenticado tenga permisos de creación de usuario.
        // Este permiso lo usamos para validar toda la sección de gestión de usuarios.

        // La función auth()->user() retorna el modelo de usuario de la sesión actual.
        if (auth()->check() && auth()->user()->puede_crear_usuarios) {
            return $next($request);
        }

        // Si no tiene permisos, lo redirigimos a una página de 401.
        return abort(401, 'Unauthenticated');
    }
}

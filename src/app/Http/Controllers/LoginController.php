<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    
    /**
     * Función que permite mostrar el formulario de inicio de sesión.
     * @param Request $request Petición realizada.
     * @return \Illuminate\Contracts\View\View
     */
    public function loginForm(Request $request)
    {
        return view('login');
    }

    /**
     * Función que permite realizar el proceso de inicio de sesión. Existen otros procesos que 
     * faltan aquí y que son esenciales como:
     * 
     * * Implementar un rate limiter.
     * * Mostrar mensajes de error al usuario.
     * * Hacer un log de autenticación para saber que personas han intentado autenticarse con qué usuario.
     * 
     * @param LoginRequest $request Petición realizada y filtrada por nuestro form request.
     */
    public function login(LoginRequest $request)
    {
        // Se intenta realizar una autenticación básica haciendo uso del correo y la clave.
        $autenticado = Auth::attempt([
            'correo' => $request->input('correo'),
            'password' => $request->input('clave') // Laravel usa por defecto el campo de password.
        ]);

        // $autenticado retorna un boolean, si se autentica el usuario...
        if ($autenticado) {
            // Se regenera la sesión para que se guarde la información asociada al usuario.
            $request->session()->regenerate();
            // Lo redirigimos a la ruta de listado de usuarios, por ahora.
            return redirect()->route('usuario.listado');
        }

        // Si la autenticación falla, lo redirigimos al login.
        // TODO: agregar errores que permitan notificar al usuario que se autenticó de manera incorrecta.
        return redirect()->route('login');
    }

    /**
     * Función que permite realizar el proceso de cierre de sesión.
     * @param Request $request Petición realizada.
     * @return \Illuminate\Http\RedirectResponse Retorna una respuesta de redirección.
     */
    public function logout(Request $request)
    {
        // Se cierra la sesión con el facade de Laravel.
        Auth::logout();

        // Se regenera la sesión y se reenvía al login.
        $request->session()->regenerate();
        return redirect()->route('login');
    }
}

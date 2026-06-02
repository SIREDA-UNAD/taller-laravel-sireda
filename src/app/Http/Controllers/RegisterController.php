<?php

namespace App\Http\Controllers;

use App\Events\CategoriaNuevaEvent;
use App\Http\Requests\RegisterRequest;
use App\Http\Requests\ValidacionesPostRequest;
use App\Mail\CategoriaNuevaMail;
use App\Models\Categoria;
use App\Models\Post;
use App\Models\Usuario;
use App\Notifications\CategoriaNuevaNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules\Password as RulesPassword;

class RegisterController extends Controller
{
    public function __construct()
    {
        $this->middleware('mi-middleware');
    }

    public function registerForm()
    {
        return view('register');
    }

    public function validaciones()
    {
        throw new \Exception('Ejemplo');
        $mailable = new CategoriaNuevaMail('andrestestthrowaway@gmail.com');
        Mail::mailer('resend')->send($mailable);
        return view('validaciones');
    }

    public function validacionesPost(ValidacionesPostRequest $request)
    {
        try {
            $categoria = Categoria::first();
            $notificacion = new CategoriaNuevaNotification($categoria);
            $usuario = Usuario::first();
            $usuario->notify($notificacion);
            Notification::send($usuario, $notificacion);
        } catch (\Exception $e) {
            Log::error($e);
        }
    }

    public function store(RegisterRequest $request)
    {
        try {
            $data = $request->all();
            $data['clave'] = Hash::make($data['clave']);
    
            $usuario = Usuario::create($data);
            if (!$usuario) {
                return redirect()->back()->withErrors(['error' => 'No se puede crear el usuario.']);
            }
    
            return redirect()->route('login');
        } catch (\Exception $e) {
            Log::error($e);
            return redirect()->back()->withErrors(['error' => 'No se puede crear el usuario.']);
        }
    }
}

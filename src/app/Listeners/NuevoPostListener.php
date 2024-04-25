<?php

namespace App\Listeners;

use App\Events\NuevoPost;
use App\Mail\NuevoPostMail;
use App\Models\Usuario;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class NuevoPostListener
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(NuevoPost $event): void
    {
        $usuarios = Usuario::where('recibe_notificaciones', 1)
            ->select('correo')
            ->get()
            ->pluck('correo');
            
        Mail::bcc($usuarios)->send(new NuevoPostMail($event->post));
    }
}

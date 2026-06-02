<?php

namespace App\Listeners;

use App\Events\CategoriaNuevaEvent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class CategoraNuevaListener implements ShouldQueue
{
    use InteractsWithQueue;

    /**
     * Create the event listener.
     */
    public function __construct()
    {
        // request -> index -> middlewares -> controllers -> response
    }

    /**
     * Handle the event.
     */
    public function handle(CategoriaNuevaEvent $event): void
    {
        $event->categoria->update(['tipo' => random_int(1, 10)]);
    }
}

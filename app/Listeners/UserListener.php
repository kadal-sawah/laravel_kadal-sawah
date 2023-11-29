<?php

namespace App\Listeners;

use App\Events\UserEvent;
use illuminate\Support\Facades\Log;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class UserListener
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
    public function handle(UserEvent $event): void
    {
        Log::debug("user {$event->username} telah {$event->action}");
    }
}

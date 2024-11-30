<?php

namespace App\Listeners;

use App\Events\registeringuser;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class sendemail
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //t
    }

    /**
     * Handle the event.
     */
    public function handle(registeringuser $event): void
    {
        //
    }
}

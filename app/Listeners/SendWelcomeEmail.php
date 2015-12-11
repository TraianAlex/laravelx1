<?php

namespace App\Listeners;

use App\Events\UserHasRegistered;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendWelcomeEmail
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  UserHasRegistered  $event
     * @return void
     */
    // public function handle(UserHasRegistered $event)
    // {
    //     var_dump('cought the event');
    // }

    public function welcome(UserHasRegistered $event)
    {
        var_dump('The user ' .$event->name.' has registered. Fire off an email.');
    }
}

<?php

namespace App\Listeners;

use App\Events\Event;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class EventListener
{
    /**
     * Create the event listener.
     *
     * @return void
     */

    protected $listen = [
        'auth.login' => [
            'App\Listeners\EventListener',
        ],
        'auth.logout' => [
            'App\Listeners\EventListener',
        ],
    ];
    
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  Event  $event
     * @return void
     */
    public function handle(Event $event)
    {
        //
        dd($event);
    }
}

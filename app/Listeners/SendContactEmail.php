<?php

namespace App\Listeners;

use Illuminate\Support\Facades\Mail;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use App\Events\ContactEmailCreated;
use App\Mail\ContactEmail;

class SendContactEmail
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
     * @param  object  $event
     * @return void
     */
    public function handle(ContactEmailCreated $event)
    {
        Mail::to('abeatrice.mail@gmail.com')->send(new ContactEmail($event->contactEmail));
    }
}

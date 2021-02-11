<?php

namespace App\Providers;

use Illuminate\Auth\Events\Registered;
use App\Events\ContactEmailCreated;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use App\Listeners\SendContactEmail;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
        ContactEmailCreated::class => [
            SendContactEmail::class,
        ],
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}

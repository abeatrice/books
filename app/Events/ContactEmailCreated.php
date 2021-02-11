<?php

namespace App\Events;

use App\Models\ContactEmail;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class ContactEmailCreated
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $contactEmail;

    /**
     * Create a new event instance.
     *
     * @param  \App\Models\ContactEmail $contactEmail
     * @return void
     */
    public function __construct(ContactEmail $contactEmail)
    {
        $this->contactEmail = $contactEmail;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new PrivateChannel('channel-name');
    }
}

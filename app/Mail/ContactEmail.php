<?php

namespace App\Mail;

use App\Models\ContactEmail as ContactEmailModel;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ContactEmail extends Mailable
{
    use Queueable, SerializesModels;

    public $contactEmail;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(ContactEmailModel $contactEmail)
    {
        $this->contactEmail = $contactEmail;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.contact');
    }
}

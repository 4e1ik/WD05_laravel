<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class UniMail extends Mailable
{
    use Queueable, SerializesModels;

    public $mailMessage;
    public $emailFriend;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($message, $email)
    {
        $this->mailMessage = $message;
        $this->emailFriend = $email;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('Artemi324@tut.by')->to('yanayazuchno@gmail.com')->text('emails.uni-mail');
    }
}

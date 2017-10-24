<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class MailNewRegistrants extends Mailable
{
    use Queueable, SerializesModels;

    public $user;
    public function __construct($user)
    {
        $this->user = $user;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('support@247globalnursingsolution.com', '24/7 GNSCS')
            ->subject('Congrats you are now successully registered!')
            ->view('tpls.emails.email_new_registrant', [
                'tpluser'  => $this->user
            ]);
    }
}
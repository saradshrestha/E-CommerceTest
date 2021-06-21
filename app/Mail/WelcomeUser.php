<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Models\User;

class WelcomeUser extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
   public function __construct($mailInfo)
    {
        $this->mailInfo = $mailInfo;
    }
    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('info@ecommerce.com', 'Mailtrap')
            ->subject('Welcome User')
            ->view('frontend.mails.welcomeuser')
            ->with('mailInfo', $this->mailInfo);
    }
}

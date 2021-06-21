<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Models\User;

class OrderDelivery extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
     public function __construct($orderInfo)
    {
        $this->orderInfo = $orderInfo;
    }
    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('info@ecommerce.com', 'Mailtrap')
            ->subject('Order Delivered')
            ->view('frontend.mails.orderdelivery')
            ->with('mailInfo', $this->orderInfo);
    }
}

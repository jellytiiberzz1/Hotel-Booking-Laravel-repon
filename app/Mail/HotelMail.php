<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Bookings;

class HotelMail extends Mailable
{
    use Queueable, SerializesModels;
    public $booking;


    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Bookings $booking)
    {
        $this->booking = $booking;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('mail.hotel');
    }
}

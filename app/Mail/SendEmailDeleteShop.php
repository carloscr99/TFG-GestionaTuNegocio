<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SendEmailDeleteShop extends Mailable
{
    use Queueable, SerializesModels;

    public $subject = 'Petición de borrado de una tienda';
    public $cif;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($cif)
    {
        $this->cif = $cif;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.sendEmailDeleteShop');
    }
}

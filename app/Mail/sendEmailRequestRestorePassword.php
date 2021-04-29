<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class sendEmailRequestRestorePassword extends Mailable
{
    use Queueable, SerializesModels;

    public $subject = 'IMPORTANTE: Petición de restablecimiento de contraseña';
    public $newPassword;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($newPassword)
    {
        $this->newPassword = $newPassword;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.sendEmailRequestRestorePassword');
    }
}

<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

/**
 * Send the contact email to website adminsitrator
 */
class Contact extends Mailable
{
    use Queueable, SerializesModels;

    private $name, $email, $message;

    /**
     * @param string $name Name who send the message
     * @param string $email Email who send the message
     * @param string $message Message that will be send
     */
    public function __construct($name, $email, $message)
    {
        $this->name = $name;
        $this->email = $email;
        $this->message = $message;
    }

    public function build()
    {
        return $this->view('contact')
            ->subject('Contato Website')
            ->with([
                "name" => $this->name,
                "email" => $this->email,
                "message_email" => $this->message
            ]);
    }
}

<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;

class MensajeRecibido extends Mailable
{
    use Queueable, SerializesModels;

    public $subject = 'Envio de documento';

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct()
    {
        
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        Log::debug("Se enviara el documento ");
        return $this->view('emails.envio-documento');
    }
}

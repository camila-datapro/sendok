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
    public function __construct(String $nombre)
    {
        $this->nombre = $nombre;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
       Log::debug("Build Mensaje Recibido: ".$this->nombre);
       $nombre = $this->nombre;

        return $this->view('emails.envio-documento')
        ->attachData(file_get_contents('./documentos/'.$nombre),$nombre,[
            'mime' => 'application/pdf',
        ]);;
    }
}

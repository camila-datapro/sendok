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
    public function __construct(String $nombre, String $contenido, Array $folletos)
    {
        $this->nombre = $nombre;
        $this->contenido = $contenido;
        $this->folletos = $folletos;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
       $nombre = $this->nombre;
       $contenido = $this->contenido;
       $folletos = $this->folletos;

       Log::debug($folletos);

       if($contenido==""){
            $contenido = "Estimado/a Cliente:
            Hacemos llegar a usted nuestra propuesta comercial.
            Saludos y gracias por su preferencia.";
       }
        $email = $this->view('emails.envio-documento')->with("contenido",$contenido);
        $email->attachData(file_get_contents('./documentos/'.$nombre),$nombre,[
            'mime' => 'application/pdf',
        ]);
        foreach($folletos as $folleto){
            $email->attachData(file_get_contents('./productos/'.$folleto),$folleto,[
                'mime' => 'application/pdf',
            ]);
        }
        
    }
}

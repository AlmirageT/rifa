<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ConfirmarSolicitud extends Mailable
{
    use Queueable, SerializesModels;
    protected $asunto;
    protected $nombre;
    protected $mensaje;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct()
    {
        /*$this->asunto = $asunto;
        $this->nombre = $nombre;
        $this->mensaje = $mensaje;*/
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        /*$asunto = $this->asunto;
        $nombre = $this->nombre;
        $mensaje = $this->mensaje;*/
        return $this->subject('Datos Bancarios')->view('mail.datosMail');        
    }
}

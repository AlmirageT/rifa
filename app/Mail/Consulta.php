<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class Consulta extends Mailable
{
    use Queueable, SerializesModels;
    protected $nombre;
    protected $correo;
    protected $fono;
    protected $consulta;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($nombre, $correo, $fono, $consulta)
    {
        $this->nombre = $nombre;
        $this->correo = $correo;
        $this->fono = $fono;
        $this->consulta = $consulta;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $nombre = $this->nombre;
        $correo = $this->correo;
        $fono = $this->fono;
        $consulta = $this->consulta;
        return $this->subject('Consulta rifa')->view('mail.mailConsulta',compact('nombre','correo','fono', 'consulta'));        
    }
}

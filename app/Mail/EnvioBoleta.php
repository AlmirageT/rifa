<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class EnvioBoleta extends Mailable
{
    use Queueable, SerializesModels;
    protected $boleta;
    protected $numeros;
    protected $fileatt;
    protected $usuario;
    protected $propiedad;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($boleta, $numeros, $fileatt, $usuario, $propiedad)
    {
        $this->boleta = $boleta;
        $this->numeros = $numeros;
        $this->fileatt = $fileatt;
        $this->usuario = $usuario;
        $this->propiedad = $propiedad;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $boleta = $this->boleta;
        $numeros = $this->numeros;
        $usuario = $this->usuario;
        $propiedad = $this->propiedad;
        $fileatt = $this->fileatt;

        return $this->from(['contacto@rifopoly.com','Rifo Mi Propiedad'])->subject('Comprobante de Compra')->attachData($fileatt, "Comprobante de Compra.pdf")->view('mail.enviarBoleta',compact('boleta','numeros','usuario','propiedad'));
    }
}

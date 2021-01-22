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
    protected $pdf;
    protected $usuario;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($boleta, $numeros, $pdf, $usuario)
    {
        $this->boleta = $boleta;
        $this->numeros = $numeros;
        $this->pdf = $pdf;
        $this->usuario = $usuario;
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
        $file = $this->pdf->output();

        return $this->from(['contacto@rifomipropiedad.com','Rifo Mi Propiedad'])->subject('Comprobante de Compra')->attachData($file, "Comprobante de Compra.pdf")->view('mail.enviarBoleta',compact('boleta','numeros','usuario'));
    }
}

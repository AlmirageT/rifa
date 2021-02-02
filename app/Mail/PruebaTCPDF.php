<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class PruebaTCPDF extends Mailable
{
    use Queueable, SerializesModels;
    protected $fileatt;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($fileatt)
    {
        $this->fileatt = $fileatt;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $fileatt = $this->fileatt;
        return $this->from(['contacto@rifomipropiedad.com','Rifo Mi Propiedad'])->subject('Comprobante de Compra')->attachData($fileatt, "Comprobante de Compra.pdf")->view('mail.hola');
    }
}

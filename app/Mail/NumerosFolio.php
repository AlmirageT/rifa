<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class NumerosFolio extends Mailable
{
    use Queueable, SerializesModels;
    protected $boleta;
    protected $numerosComprados;
    protected $total;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($boleta, $numerosComprados, $total)
    {
        $this->boleta = $boleta;
        $this->numerosComprados = $numerosComprados;
        $this->total = $total;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $boleta = $this->boleta;
        $numerosComprados = $this->numerosComprados;
        $total = $this->total;
        return $this->subject('Datos Bancarios')->view('mail.mailRespaldo',compact('boleta','numerosComprados','total'));        
    }
}

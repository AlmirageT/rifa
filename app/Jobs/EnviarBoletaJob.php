<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\Mail\EnvioBoleta;
use App\SMS;
use App\LogTransaccion;
use PDFTC;
use QrCode;
use Mail;
use Log;

class EnviarBoletaJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    protected $boleta;
    protected $numeros;
    protected $usuario;
    protected $propiedad;
    //protected $fileatt;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($numeros, $boleta, $usuario, $propiedad)
    {
        $this->boleta = $boleta;
        $this->numeros = $numeros;
        $this->usuario = $usuario;
        $this->propiedad = $propiedad;
        //$this->fileatt = $fileatt;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $boleta = $this->boleta;
        $numeros = $this->numeros;
        $usuario = $this->usuario;
        $propiedad = $this->propiedad;

        $direccion = asset('comprobar/boleta')."/".Crypt::encrypt($boleta->idBoleta);
        $qr = QrCode::format('png')->size(200)->generate($direccion);
        //$fileatt = $this->fileatt;
        $certificate = 'file://'.base_path().'/public/certificado/certificadoRifo.crt';
        $key = 'file://'.base_path().'/public/certificado/llaveNoEncriptada.key';
        $info = array(
            'Name' => 'RIFOPOLY',
            'Location' => 'Tobalaba 4067',
            'Reason' => 'Validacion Compra',
            'ContactInfo' => 'https://rifopoly.com/',
        );
        PDFTC::setSignature($certificate, $key, 'tcpdfdemo', '', 2, $info);
        PDFTC::setHeaderCallback(function($pdf)
        {
            $style = array(
                'vpadding' => 'auto',
                'hpadding' => 'auto',
                'fgcolor' => array(0,0,0),
                'bgcolor' => false,
                'module_width' => 1,
                'module_height' => 1
            );
            $image_file = base_path().'/public/images/variantes logo rifopoly-05.png';
            $pdf->Image($image_file, 15, 10, 48, '', 'PNG', '', 'T', false, 500, '', false, false, 0, false, false, false);
        });
        //PDFTC::SetFont('helvetica', '', 12);
        PDFTC::SetTitle('Comprobante de Venta.pdf');
        PDFTC::AddPage();
        
        PDFTC::SetMargins(10, 35, 10, true);
        PDFTC::SetProtection(array('modify'));
        // print a line of text
        $text = view('admin.boletas.pdf2',compact('boleta','numeros','qr','usuario','propiedad'));

        // add view content
        PDFTC::writeHTML($text, true, false, true, false, '');
        $img_base64_encoded = 'data:image/png;base64,'.base64_encode($qr);

        $img = '<p align="center"><img src="@' . preg_replace('#^data:image/[^;]+;base64,#', '', $img_base64_encoded) . '"></p>';

        PDFTC::writeHTML($img, true, false, true, false, '');
        //PDFTC::writeHTML($text, true, 0, true, 0);
        // define active area for signature appearance
        PDFTC::setSignatureAppearance(180, 60, 15, 15);
        
        // save pdf file
        $fileatt = PDFTC::Output('Comprobante de Venta.pdf', 'S');
        PDFTC::reset();
        $cantidadNumero = strlen(strval($usuario->telefonoUsuario));

        try {
            Mail::to($usuario->correoUsuario)->bcc(['pauloberrios@gmail.com','tickets@rifopoly.com','lina.di@isbast.com','ivan.saez@informatica.isbast.com'])->send(new EnvioBoleta($boleta, $numeros, $fileatt, $usuario,$propiedad));
            LogTransaccion::create([
                'tipoTransaccion' => "MAIL ENVIADO",
                'modeloOrigen' => "EMAIL",
                'idUsuario' => $usuario->idUsuario
            ]);
            $enviar = SMS::sendSMS();
            if($cantidadNumero == 9 ){
                $enviar['cliente']->messages->create( '+56'.$usuario->telefonoUsuario,[
                    'from' => $enviar['numero'], 
                    'body' => 'Gracias por comprar tu ticket en rifopoly. Descarga tu ticket en https://rifopoly.com/tickets/'.$boleta->tokenCorto
                    ] 
                );
            }else if($cantidadNumero == 11){
                $enviar['cliente']->messages->create( '+'.$usuario->telefonoUsuario,[
                    'from' => $enviar['numero'], 
                    'body' => 'Gracias por comprar tu ticket en rifopoly. Descarga tu ticket en https://rifopoly.com/tickets/'.$boleta->tokenCorto
                    ] 
                );
            }else if($cantidadNumero == 12){
                $enviar['cliente']->messages->create($usuario->telefonoUsuario,[
                    'from' => $enviar['numero'], 
                    'body' => 'Gracias por comprar tu ticket en rifopoly. Descarga tu ticket en https://rifopoly.com/tickets/'.$boleta->tokenCorto
                    ] 
                );
            }
            LogTransaccion::create([
                'tipoTransaccion' => "SMS ENVIADO",
                'modeloOrigen' => "SMS",
                'idUsuario' => $usuario->idUsuario
            ]);
        } catch (\Exception $th) {
            LogTransaccion::create([
                'tipoTransaccion' => "EL MAIL NO SE ENVIO",
                'modeloOrigen' => "EMAIL",
                'idUsuario' => $usuario->idUsuario
            ]);
            if($cantidadNumero == 9 ){
                $enviar['cliente']->messages->create( '+56'.$usuario->telefonoUsuario,[
                    'from' => $enviar['numero'], 
                    'body' => 'Gracias por comprar tu ticket en rifopoly. Descarga tu ticket en https://rifopoly.com/tickets/'.$boleta->tokenCorto
                    ] 
                );
            }else if($cantidadNumero == 11){
                $enviar['cliente']->messages->create( '+'.$usuario->telefonoUsuario,[
                    'from' => $enviar['numero'], 
                    'body' => 'Gracias por comprar tu ticket en rifopoly. Descarga tu ticket en https://rifopoly.com/tickets/'.$boleta->tokenCorto
                    ] 
                );
            }else if($cantidadNumero == 12){
                $enviar['cliente']->messages->create($usuario->telefonoUsuario,[
                    'from' => $enviar['numero'], 
                    'body' => 'Gracias por comprar tu ticket en rifopoly. Descarga tu ticket en https://rifopoly.com/tickets/'.$boleta->tokenCorto
                    ] 
                );
            }
            LogTransaccion::create([
                'tipoTransaccion' => "SMS ENVIADO",
                'modeloOrigen' => "SMS",
                'idUsuario' => $usuario->idUsuario
            ]);
        }


        
        


    }
}

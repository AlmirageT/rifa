<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use App\Mail\EnvioBoleta;
use App\Propiedad;
use App\Premio;
use App\ParametroGeneral;
use App\Boleta;
use App\Numero;
use App\Usuario;
use App\BoletaPropiedad;
use PDF;
use PDFTC;
use QrCode;
use Mail;

class WelcomeController extends Controller
{
    public function index()
    {
        $parametroGeneral = ParametroGeneral::where('nombreParametroGeneral','CANTIDAD PROPIEDADES CARROUSEL')->first();

        $propiedades = Propiedad::select('*')
            ->join('paises','propiedades.idPais','=','paises.idPais')
            ->join('regiones','propiedades.idRegion','=','regiones.idRegion')
            ->join('comunas','propiedades.idComuna','=','comunas.idComuna')
            ->join('provincias','propiedades.idProvincia','=','provincias.idProvincia')
            ->where('propiedades.idEstado',7)
            ->orderBy('propiedades.idPropiedad','DESC')
            ->limit($parametroGeneral->valorParametroGeneral)
            ->get();

        $premios = Premio::select('*')
            ->join('tipos_premios','premios.idTipoPremio','=','tipos_premios.idTipoPremio')
            ->get();

        
        
        return view('welcome',compact('propiedades','premios'));
    }
    public function pdf()
    {
        $boleta = Boleta::find(187);
        $numeros = Numero::where('idBoleta',187)->get();
        $direccion = asset('comprobar/boleta')."/".Crypt::encrypt($boleta->idBoleta);
        $qr = QrCode::format('png')->size(200)->generate($direccion);
        $usuario = Usuario::find(125);
        $boletasPropiedades = BoletaPropiedad::where('idBoleta',187)->get();
        $idPropiedad = array();
        foreach($boletasPropiedades as $boletaPropiedad){
            $array = array(
                'idPropiedad' => $boletaPropiedad->idPropiedad
            );
            array_push($idPropiedad,$array);
        }
        $propiedad = Propiedad::whereIn('idPropiedad',$idPropiedad)->get();
        // set certificate file
        //return view('admin.boletas.pdf2',compact('boleta','numeros','qr','usuario','propiedad'));

        $certificate = 'file://'.base_path().'/public/certificado/certificadoRifo.crt';
        $key = 'file://'.base_path().'/public/certificado/llaveNoEncriptada.key';
        $info = array(
            'Name' => 'RIFOPOLY',
            'Location' => 'Tobalaba 4067',
            'Reason' => 'Validacion Compra',
            'ContactInfo' => 'https://rifopoly.com/',
        );
        PDFTC::setSignature($certificate, $key, 'tcpdfdemo', '', 2, $info);
        
        //PDFTC::SetFont('helvetica', '', 12);
        PDFTC::SetTitle('Comprobante de Venta.pdf');
        PDFTC::AddPage();
        

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
        
        Mail::to($usuario->correoUsuario)->bcc(['pauloberrios@gmail.com','tickets@rifopoly.com','lina.di@isbast.com','ivan.saez@informatica.isbast.com'])->send(new EnvioBoleta($boleta, $numeros, $fileatt, $usuario,$propiedad));


        //return view('admin.boletas.pdf',compact('boleta','numeros','qr','usuario','propiedad'));
        //return $pdf->download('listado.pdf');
    }
}

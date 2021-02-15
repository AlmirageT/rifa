<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use App\Mail\EnvioBoleta;
use App\Jobs\EnviarBoletaJob;
USE App\Mail\ContadorJobs;
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
use DB;

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
        EnviarBoletaJob::dispatch($numeros, $boleta, $usuario, $propiedad);
        


        //return view('admin.boletas.pdf',compact('boleta','numeros','qr','usuario','propiedad'));
        //return $pdf->download('listado.pdf');
    }

    public function contarJobs()
    {
        $jobsFallidos = DB::table('failed_jobs')->get();
        if(count($jobsFallidos) >= 5){
            Mail::to('pauloberrios@gmail.com')->bcc('ivan.saez@informatica.isbast.com')->send(new ContadorJobs());
        }
    }
}

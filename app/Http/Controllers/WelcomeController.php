<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use App\Propiedad;
use App\Premio;
use App\ParametroGeneral;
use App\Boleta;
use App\Numero;
use App\Usuario;
use App\BoletaPropiedad;
use QrCode;

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
        $boleta = Boleta::find(194);
        $numeros = Numero::where('idBoleta',194)->get();
        $direccion = asset('comprobar/boleta')."/".Crypt::encrypt($boleta->idBoleta);
        $qr = QrCode::format('png')->size(200)->generate($direccion);
        $usuario = Usuario::find(132);
        $boletaPropiedad = BoletaPropiedad::select('*')
            ->join('propiedades','boletas_propiedades.idPropiedad','=','propiedades.idPropiedad')
            ->where('idBoleta',194)->get();
        return view('admin.boletas.pdf',compact('boleta','numeros','qr','usuario','boletaPropiedad'));
        $pdf = PDF::loadView('admin.boletas.pdf',compact('boleta','numeros','qr','usuario','boletaPropiedad'));
    }
}

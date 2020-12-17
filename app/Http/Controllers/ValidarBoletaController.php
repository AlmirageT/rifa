<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use App\Boleta;
use App\Numero;

class ValidarBoletaController extends Controller
{
    public function validacionBoleta($idBoleta)
    {
    	$boleta = Boleta::select('*')
    	->join('usuarios','boletas.idUsuario','=','usuarios.idUsuario')
        ->join('estados','boletas.idEstado','=','estados.idEstado')
        ->where('boletas.idBoleta',Crypt::decrypt($idBoleta))
        ->where('boletas.idEstado',3)
        ->get();
        if (count($boleta)>0) {
        	$numeros = Numero::where('idBoleta',Crypt::decrypt($idBoleta))->get();
        	return view('exito',compact('boleta','numeros'));
        }else{
        	return abort(404);
        }
    }
}

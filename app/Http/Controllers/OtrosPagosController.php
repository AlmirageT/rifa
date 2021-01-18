<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Jobs\EnviarBoletaJob;
use App\Boleta;
use App\Numero;
use App\Usuario;
use Log;

class OtrosPagosController extends Controller
{
    public function condeu01req(Request $request){

        //Log::info($request);
        
        $boleta = Boleta::where('idBoleta',$request->p_idcli)
            ->where('idEstado',2)
            ->first();
        if($boleta){

            $convenio = getenv('OTROS_PAGOS_COVENIO');
            //Log::info($convenio);
            $key = $request->p_fectr.$request->p_tid.$convenio;
            $llave = str_pad($key,16);
            $encriptacion = openssl_encrypt($llave, "AES-256-CBC",getenv('OTROS_PAGOS_KEY'),1,getenv('OTROS_PAGOS_IV'));
            //Log::info($encriptacion);
            $h_firma = base64_encode($encriptacion);
            //Log::info($h_firma);
            $headers = apache_request_headers();
            foreach($headers as $header => $value){
                if($header == "H-Firma"){
                    if($value != $h_firma){
                        return response()->json(['r_retcod' => "65"],200);
                    }
                }
            }
            $idTransaccion = (int)$request->p_tid;
            if($idTransaccion){
                return response()->json([
                    'r_tid' => $idTransaccion,
                    'r_retcod' => "00",
                    'r_ndoc' => "0001",
                    'r_docs' => [
                        array(
                            'r_doc' => "".$boleta->idBoleta."",
                            'r_mnt' => str_pad(strval($boleta->totalBoleta),10,"0",STR_PAD_LEFT)."00",
                            'r_mnv' => str_pad(strval($boleta->totalBoleta),10,"0",STR_PAD_LEFT)."00",
                            'r_fev' => strftime("%Y%m%d",strtotime($boleta->fechaVencimiento)),
                            'r_fem' => date('Ymd'),
                            'r_det' => $h_firma 
                        )
                    ]
                ], 200);
            }else{
                return response()->json(['r_retcod'=>"03"],200);
            }
        }else{
            return response()->json(['r_retcod'=>"03"],200);
        }

    }
    public function notpag01req(Request $request){
        $idTransaccion = (int)$request->p_tid;
        if($idTransaccion){
            $convenio = getenv('OTROS_PAGOS_COVENIO');
            $key = $request->p_fectr.$request->p_tid.$convenio;
            $llave = str_pad($key,16);
            $encriptacion = openssl_encrypt($llave, "AES-256-CBC",getenv('OTROS_PAGOS_KEY'),1,getenv('OTROS_PAGOS_IV'));
            $h_firma = base64_encode($encriptacion);
            $headers = apache_request_headers();
            foreach($headers as $header => $value){
                if($header == "H-Firma"){
                    if($value != $h_firma){
                        return response()->json(['r_retcod' => "65"],200);
                    }
                }
            }
            $boleta = Boleta::find($request->p_idcli);
            
            if($boleta){
                $boleta->idEstado = 3;
                $boleta->idOtrosPagosTransaccion = $idTransaccion;
                $boleta->save();
                $numeros = Numero::where('idBoleta',$request->p_idcli)->get();
                foreach($numeros as $numero){
                    $numero->idBoleta = null;
                    $numero->idEstado = 3;
                    $numero->save();
                }
                $usuario = Usuario::find($boleta->idUsuario);
                Log::info($usuario);
                EnviarBoletaJob::dispatch($numeros, $boleta, $usuario);
                //sigue otros pagos
                return response()->json([
                    'r_tid' => $idTransaccion,
                    'r_retcod' => "00",
                    'r_cau' => $request->p_doc
                ],200);
            }else{
                return response()->json([
                    'r_tid' => $idTransaccion,
                    'r_retcod' => "10",
                    'r_cau' => $request->p_doc
                ],200);
            }
        }
    }
    public function revpag01req(Request $request){
        $boleta = Boleta::find($request->p_idcli);
        $idTransaccion = (int)$request->p_tid;
        if($boleta){
            if($boleta->idEstado == 3 || $boleta->idEstado == 2){
                $boleta->idEstado = 5;
                $boleta->save();
                $numeros = Numero::where('idBoleta',$request->p_idcli)->get();
                foreach($numeros as $numero){
                    $numero->idEstado = 1;
                    $numero->save();
                }
                return response()->json([
                    'r_tid' => $idTransaccion,
                    'r_retcod' => "00"
                ],200);
            }
        }
        return response()->json([
            'r_tid' => $idTransaccion,
            'r_retcod' => "13"
        ],200);
    }
}

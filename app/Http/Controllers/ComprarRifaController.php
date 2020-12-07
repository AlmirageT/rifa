<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Database\QueryException;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use App\Actions\VerificarRutAction;
use App\Mail\ConfirmarSolicitud;
use App\Mail\NumerosFolio;
use App\Numero;
use App\Usuario;
use App\Boleta;
use Mail;
use DB;

class ComprarRifaController extends Controller
{
    public function numeros()
    {
    	for ($i=99; $i < 100000; $i++) { 
    		Numero::create([
    			'valorNumero'=>20000,
                'numero' => $i+1,
                'idEstado' => 1
    		]);
    	}
    	return "exito";
    }
    public function index()
    {
    	$numeros = Numero::where('idEstado',1)->take(100)->get();
    	return view('rifa',compact('numeros'));
    }
    public function numerosBuscados(Request $request)
    {
    	$numeros = Numero::where('idEstado',1)
    	->where('numero','LIKE',"%{$request->consulta}%")
    	->get();
    	return json_encode($numeros);
    	
    }
    public function envioEmail(Request $request)
    {
    	try{
            DB::beginTransaction();
	    	$rut = $request->rutUsuario;
	        $caracteresEspeciales = array(".");
	        $rutSinCaracteres = str_replace($caracteresEspeciales, "", $rut);

	        $VerificarRutAction = new VerificarRutAction();
	        $rutVerificado = $VerificarRutAction->execute($rutSinCaracteres);
	        if ($rutVerificado == false) {
            	toastr()->warning('El rut ingresado no es valido, intente nuevamente');
                DB::rollback();
	            return back();
	        }
	        $buscarUsuario = Usuario::where('correoUsuario',$request->correoUsuario)->orWhere('rutUsuario',$rutSinCaracteres)->first();
	        if($buscarUsuario){
	        	$usuario = $buscarUsuario;
	        }else{
		    	$usuario = Usuario::create([
		    		'nombreUsuario' => $request->nombreUsuario,
			    	'correoUsuario' => $request->correoUsuario,
			    	'telefonoUsuario' => $request->telefonoUsuario,
			    	'rutUsuario' => $rutSinCaracteres
		    	]);
	        }
            $numerosComprados = $request->numeros;
            $total = count($request->numeros)*20000;
	    	$boleta = Boleta::create([
                'totalBoleta' => $total,
	    		'idUsuario' => $usuario->idUsuario
	    	]);
	    	if (count($request->numeros) > 0) {
		    	$numeros = Numero::whereIn('numero',$request->numeros)->update([
		    		'idBoleta' => $boleta->idBoleta,
		    		'idEstado' => 2
		    	]);
	    	}else{
	    		$numeros = Numero::where('numero',$request->numeros)->update([
	    			'idBoleta' => $boleta->idBoleta,
		    		'idEstado' => 2
		    	]);
	    	}
            Mail::to($usuario->correoUsuario)->send(new ConfirmarSolicitud($boleta, $numerosComprados, $total));
	    	Mail::to('pagos@rifomipropiedad.com')->send(new NumerosFolio($boleta, $numerosComprados, $total));
            DB::commit();
	    	return view('datos',compact('numerosComprados','total'));
    	} catch (ModelNotFoundException $e) {
            toastr()->warning('No autorizado');
            DB::rollback();
            return back();
        } catch (QueryException $e) {
            toastr()->warning('Ha ocurrido un error, favor intente nuevamente' . $e->getMessage());
            DB::rollback();
            return back();
        } catch (DecryptException $e) {
            toastr()->info('Ocurrio un error al intentar acceder al recurso solicitado');
            DB::rollback();
            return back();
        } catch (\Exception $e) {
            DB::rollback();         
            toastr()->error('Ha surgido un error inesperado', $e->getMessage(), ['timeOut' => 9000]);
            return redirect::back();
        }
    }
}

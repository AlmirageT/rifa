<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Database\QueryException;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Validator;
use App\Mail\ConfirmarSolicitud;
use App\Mail\NumerosFolio;
use App\Numero;
use App\Usuario;
use App\Boleta;
use Mail;
use DB;

class ComprarRifaController extends Controller
{
    public function hastaCien()
    {
        for ($i=0; $i < 100000; $i++) { 
            Numero::create([
                'numero' => $i+1,
                'valorNumero' => 20000,
                'idEstado' => 1
            ]);
        }
        return "exito";

    }
    public function numeros()
    {
    	$totalNumeros = Numero::all();
        foreach($totalNumeros as $numero){
            $sinEspacio = trim($numero->numero);
            $resta = strlen($sinEspacio);
            $valorNumero = $numero->numero;
            switch ($resta) {
                case 1:
                    Numero::find($numero->idNumero)->update([
                        'numero' => '0000'.$valorNumero
                    ]);
                    break;
                case 2:
                    Numero::find($numero->idNumero)->update([
                        'numero' => '000'.$valorNumero
                    ]);
                    break;
                case 3:
                    Numero::find($numero->idNumero)->update([
                        'numero' => '00'.$valorNumero
                    ]);
                    break;
                case 4:
                    Numero::find($numero->idNumero)->update([
                        'numero' => '0'.$valorNumero
                    ]);
                    break;
                default:
                    # code...
                    break;
            }
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
            $validator = Validator::make($request->all(), [
                'correoUsuario'=> 'required|email',
                'telefonoUsuario'=> 'required',
                'rutUsuario'=> 'required',
                'numeros'=>'required'
            ]);
            if ($validator->fails()) {
                toastr()->info('Todos los datos deben estar llenos');
                return back();
            }
            DB::beginTransaction();
	    	
	    	$usuario = Usuario::create([
	    		'nombreUsuario' => $request->nombreUsuario,
		    	'correoUsuario' => $request->correoUsuario,
		    	'telefonoUsuario' => $request->telefonoUsuario,
		    	'rutUsuario' => $request->rutUsuario
	    	]);
            $total = count($request->numeros)*20000;
	    	$boleta = Boleta::create([
                'totalBoleta' => $total,
	    		'idUsuario' => $usuario->idUsuario,
                'idEstado' => 2
	    	]);
	    	if (count($request->numeros) > 0) {
                $numerosComprados = Numero::whereIn('idNumero',$request->numeros)->get();
                foreach($request->numeros as $num){
    		    	$numeros = Numero::where('idNumero',$num)->update([
    		    		'idBoleta' => $boleta->idBoleta,
    		    		'idEstado' => 2
    		    	]);
                }
	    	}else{
                $numerosComprados = Numero::where('idNumero',$request->numeros)->get();

	    		$numeros = Numero::where('idNumero',$request->numeros)->update([
	    			'idBoleta' => $boleta->idBoleta,
		    		'idEstado' => 2
		    	]);
	    	}
            Mail::to($usuario->correoUsuario)->bcc(['pauloberrios@gmail.com', 'ivan.saez@informatica.isbast.com','lina.di@isbast.com'])->send(new ConfirmarSolicitud($boleta, $numerosComprados, $total));
	    	Mail::to('tickets@rifomipropiedad.com')->bcc(['pauloberrios@gmail.com', 'ivan.saez@informatica.isbast.com','lina.di@isbast.com'])->send(new NumerosFolio($boleta, $numerosComprados, $total,$usuario));
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
            return back();
        }
    }
}

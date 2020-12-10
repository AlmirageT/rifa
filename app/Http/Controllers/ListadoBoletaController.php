<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Database\QueryException;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use App\Mail\EnvioBoleta;
use App\Boleta;
use App\Numero;
use Session;
use Mail;
use PDF;
use DB;

class ListadoBoletaController extends Controller
{
    public function index()
    {
    	if (!Session::has('correoUsuario') || !Session::has('rutUsuario') || !Session::has('idTipoUsuario') || !Session::has('idUsuario') || !Session::has('nombreUsuario')) {
            return abort(401);
        }
    	return view('admin.boletas.index');
    }
    public function listaBoletas(Request $request)
    {
    	$columns = array(
			0=> 'idBoleta',
			1=> 'totalBoleta',
			2=> 'nombreUsuario',
			3=> 'rutUsuario',
			4=> 'correoUsuario',
			5=> 'telefonoUsuario',
			6=> 'nombreEstado',
			7=> 'options'
		);
		$totalData = Boleta::select('*')
		        ->join('usuarios','boletas.idUsuario','=','usuarios.idUsuario')
		        ->join('estados','boletas.idEstado','=','estados.idEstado')
		        ->count();
		$totalFiltered = $totalData;

		$limit = $request->input('length');
		$start = $request->input('start');
		$order = $columns[$request->input('order.0.column')];
		$dir = $request->input('order.0.dir');

		if(empty($request->input('search.value')))
		{
			$boletas = Boleta::select('*')
		        ->join('usuarios','boletas.idUsuario','=','usuarios.idUsuario')
		        ->join('estados','boletas.idEstado','=','estados.idEstado')
				->offset($start)
				->limit($limit)
				->orderBy($order,$dir)
				->get();
		}else{
			$search = $request->input('search.value');
			$boletas = Boleta::select('*')
		        ->join('usuarios','boletas.idUsuario','=','usuarios.idUsuario')
		        ->join('estados','boletas.idEstado','=','estados.idEstado')
		    	->where('usuarios.nombreUsuario', 'LIKE',"%{$search}%")
		    	->orWhere('usuarios.correoUsuario', 'LIKE',"%{$search}%")
		    	->orWhere('usuarios.rutUsuario', 'LIKE',"%{$search}%")
		    	->orWhere('boletas.idBoleta', 'LIKE',"%{$search}%")
				->offset($start)
				->limit($limit)
				->orderBy($order,$dir)
				->get();

			$totalFiltered = Boleta::select('*')
		        ->join('usuarios','boletas.idUsuario','=','usuarios.idUsuario')
		        ->join('estados','boletas.idEstado','=','estados.idEstado')
		    	->where('usuarios.nombreUsuario', 'LIKE',"%{$search}%")
		    	->orWhere('usuarios.correoUsuario', 'LIKE',"%{$search}%")
		    	->orWhere('usuarios.rutUsuario', 'LIKE',"%{$search}%")
		    	->orWhere('boletas.idBoleta', 'LIKE',"%{$search}%")
				->count();
		}

		$data = array();
		if(!empty($boletas)){
			foreach ($boletas as $boleta){
				$nestedData['idBoleta'] = $boleta->idBoleta;
				$nestedData['totalBoleta'] = "$".number_format($boleta->totalBoleta,0,',','.');
				$nestedData['nombreUsuario'] = $boleta->nombreUsuario;
				$nestedData['rutUsuario'] = $boleta->rutUsuario;
				$nestedData['correoUsuario'] = $boleta->correoUsuario;
				$nestedData['telefonoUsuario'] = $boleta->telefonoUsuario;
				$nestedData['nombreEstado'] = $boleta->nombreEstado;
				$nestedData['options'] = "<div class='dropdown'>
		                        <a href='' class='dropdown-toggle card-drop' data-toggle='dropdown' aria-expanded='false'>
		                            <i class='mdi mdi-dots-horizontal font-size-18'></i>
		                        </a>
		                        <div class='dropdown-menu dropdown-menu-right'>
		                        	<a href='".asset('administrador/transacciones/boletas/detalle-boleta')."/".$boleta->idBoleta."' class='dropdown-item btn btn-info'>Detalles</a>
		                        	<a href='".asset('administrador/transacciones/boletas/enviar-boleta')."/".$boleta->idBoleta."' class='dropdown-item btn btn-info'>Enviar Boleta</a>
		                        	<a class='dropdown-item btn btn-info'>Cancelar Compra</a>
		                        </div>
		                    </div>";
				$data[] = $nestedData;
			}
		}
		$json_data = array(
			"draw" => intval($request->input('draw')),
			"recordsTotal" => intval($totalData),
			"recordsFiltered" => intval($totalFiltered),
			"data" => $data
		);
		echo json_encode($json_data);
    }
    public function detalle($idBoleta)
    {
    	if (!Session::has('correoUsuario') || !Session::has('rutUsuario') || !Session::has('idTipoUsuario') || !Session::has('idUsuario') || !Session::has('nombreUsuario')) {
            return abort(401);
        }
    	try{

	    	$boleta = Boleta::select('*')
			        ->join('usuarios','boletas.idUsuario','=','usuarios.idUsuario')
			    	->where('boletas.idBoleta', $idBoleta)
			    	->firstOrFail();
			$numeros = Numero::where('idBoleta',$idBoleta)->get();
			return view('admin.boletas.detalleBoleta',compact('boleta','numeros'));

		} catch (ModelNotFoundException $e) {
            toastr()->warning('No autorizado');
            return back();
        } catch (QueryException $e) {
            toastr()->warning('Ha ocurrido un error, favor intente nuevamente' . $e->getMessage());
            return back();
        } catch (DecryptException $e) {
            toastr()->info('Ocurrio un error al intentar acceder al recurso solicitado');
            return back();
        } catch (Exception $e) {
            toastr()->error('Ha surgido un error inesperado', $e->getMessage(), ['timeOut' => 9000]);
            return back();
        }
    }
    public function enviarBoleta($idBoleta)
    {
    	if (!Session::has('correoUsuario') || !Session::has('rutUsuario') || !Session::has('idTipoUsuario') || !Session::has('idUsuario') || !Session::has('nombreUsuario')) {
            return abort(401);
        }
    	try{

	    	$boleta = Boleta::select('*')
			        ->join('usuarios','boletas.idUsuario','=','usuarios.idUsuario')
			    	->where('boletas.idBoleta', $idBoleta)
			    	->firstOrFail();
			$numeros = Numero::where('idBoleta',$idBoleta)->get();
			//return view('boletas.pdf',compact('boleta','numeros'));
			$pdf = PDF::loadView('admin.boletas.pdf',compact('boleta','numeros'));
            Mail::to($boleta->correoUsuario)->bcc('pauloberrios@gmail.com')->send(new EnvioBoleta($boleta, $numeros, $pdf));
            toastr()->info('Correo enviado exitosamente');
			return back();

		} catch (ModelNotFoundException $e) {
            toastr()->warning('No autorizado');
            return back();
        } catch (QueryException $e) {
            toastr()->warning('Ha ocurrido un error, favor intente nuevamente' . $e->getMessage());
            return back();
        } catch (DecryptException $e) {
            toastr()->info('Ocurrio un error al intentar acceder al recurso solicitado');
            return back();
        } catch (Exception $e) {
            toastr()->error('Ha surgido un error inesperado', $e->getMessage(), ['timeOut' => 9000]);
            return back();
        }
    }
}

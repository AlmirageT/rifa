<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Boleta;
use Session;

class BoletasCompradasController extends Controller
{
    public function index()
    {
    	if (!Session::has('correoUsuario') || !Session::has('rutUsuario') || !Session::has('idTipoUsuario') || !Session::has('idUsuario') || !Session::has('nombreUsuario')) {
            return abort(401);
        }
    	return view('admin.boletas.compradas.index');
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
			6=> 'created_at',
			7=> 'options'
		);
		$totalData = Boleta::select('boletas.*','usuarios.*','estados.*','boletas.created_at as fechaCompra')
		        ->join('usuarios','boletas.idUsuario','=','usuarios.idUsuario')
		        ->join('estados','boletas.idEstado','=','estados.idEstado')
		        ->where('boletas.idEstado',2)
		        ->count();
		$totalFiltered = $totalData;

		$limit = $request->input('length');
		$start = $request->input('start');

		if(empty($request->input('search.value')))
		{
			$boletas = Boleta::select('boletas.*','usuarios.*','estados.*','boletas.created_at as fechaCompra')
		        ->join('usuarios','boletas.idUsuario','=','usuarios.idUsuario')
		        ->join('estados','boletas.idEstado','=','estados.idEstado')
		        ->where('boletas.idEstado',2)
				->offset($start)
				->limit($limit)
				->orderBy('boletas.idBoleta','desc')
				->get();
		}else{
			$search = $request->input('search.value');
			$boletas = Boleta::select('boletas.*','usuarios.*','estados.*','boletas.created_at as fechaCompra')
		        ->join('usuarios','boletas.idUsuario','=','usuarios.idUsuario')
		        ->join('estados','boletas.idEstado','=','estados.idEstado')
		        ->where('boletas.idEstado',2)
		    	->where('usuarios.nombreUsuario', 'LIKE',"%{$search}%")
		    	->orWhere('usuarios.correoUsuario', 'LIKE',"%{$search}%")
		    	->orWhere('usuarios.rutUsuario', 'LIKE',"%{$search}%")
		    	->orWhere('boletas.idBoleta', 'LIKE',"%{$search}%")
				->offset($start)
				->limit($limit)
				->orderBy('boletas.idBoleta','desc')
				->get();

			$totalFiltered = Boleta::select('boletas.*','usuarios.*','estados.*','boletas.created_at as fechaCompra')
		        ->join('usuarios','boletas.idUsuario','=','usuarios.idUsuario')
		        ->join('estados','boletas.idEstado','=','estados.idEstado')
		        ->where('boletas.idEstado',2)
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
				$nestedData['created_at'] = date("d-m-Y",strtotime($boleta->fechaCompra));
				if ($boleta->idEstado == 2) {
					$nestedData['options'] = "<div class='dropdown'>
		                        <a href='' class='dropdown-toggle card-drop' data-toggle='dropdown' aria-expanded='false'>
		                            <i class='mdi mdi-dots-horizontal font-size-18'></i>
		                        </a>
		                        <div class='dropdown-menu dropdown-menu-center'>
		                        	<a href='".asset('administrador/transacciones/boletas/compradas/detalle-boleta')."/".$boleta->idBoleta."' class='dropdown-item btn btn-info'>Detalles</a>
		                        	<a href='".asset('administrador/transacciones/boletas/compradas/enviar-boleta')."/".$boleta->idBoleta."' class='dropdown-item btn btn-info'>Enviar Boleta</a>
		                        	<a href='".asset('administrador/transacciones/boletas/compradas/liberar-boleta')."/".$boleta->idBoleta."' class='dropdown-item btn btn-info'>Liberar Boleta</a>
		                        </div>
		                    </div>";
				}
				if ($boleta->idEstado != 2) {
					$nestedData['options'] = "<div class='dropdown'>
		                        <a href='' class='dropdown-toggle card-drop' data-toggle='dropdown' aria-expanded='false'>
		                            <i class='mdi mdi-dots-horizontal font-size-18'></i>
		                        </a>
		                        <div class='dropdown-menu dropdown-menu-center'>
		                        	<a href='".asset('administrador/transacciones/boletas/detalle-boleta')."/".$boleta->idBoleta."' class='dropdown-item btn btn-info'>Detalles</a>
		                        </div>
		                    </div>";
				}
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
}

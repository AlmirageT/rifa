<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\BoletasValidadasExport;
use App\Boleta;
use Session;

class BoletasValidadasController extends Controller
{
    public function index()
    {
    	if (!Session::has('correoUsuario') || !Session::has('rutUsuario') || !Session::has('idTipoUsuario') || !Session::has('idUsuario') || !Session::has('nombreUsuario')) {
            return abort(401);
        }
    	return view('admin.boletas.validadas.index');
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
			6=> 'options'
		);
		$totalData = Boleta::select('*')
		        ->join('usuarios','boletas.idUsuario','=','usuarios.idUsuario')
		        ->join('estados','boletas.idEstado','=','estados.idEstado')
		        ->where('boletas.idEstado',3)
		        ->count();
		$totalFiltered = $totalData;

		$limit = $request->input('length');
		$start = $request->input('start');

		if(empty($request->input('search.value')))
		{
			$boletas = Boleta::select('*')
		        ->join('usuarios','boletas.idUsuario','=','usuarios.idUsuario')
		        ->join('estados','boletas.idEstado','=','estados.idEstado')
		        ->where('boletas.idEstado',3)
				->offset($start)
				->limit($limit)
				->orderBy('boletas.idBoleta','desc')
				->get();
		}else{
			$search = $request->input('search.value');
			$boletas = Boleta::select('*')
		        ->join('usuarios','boletas.idUsuario','=','usuarios.idUsuario')
		        ->join('estados','boletas.idEstado','=','estados.idEstado')
		        ->where('boletas.idEstado',3)
		    	->where('usuarios.nombreUsuario', 'LIKE',"%{$search}%")
		    	->orWhere('usuarios.correoUsuario', 'LIKE',"%{$search}%")
		    	->orWhere('usuarios.rutUsuario', 'LIKE',"%{$search}%")
		    	->orWhere('boletas.idBoleta', 'LIKE',"%{$search}%")
				->offset($start)
				->limit($limit)
				->orderBy('boletas.idBoleta','desc')
				->get();

			$totalFiltered = Boleta::select('*')
		        ->join('usuarios','boletas.idUsuario','=','usuarios.idUsuario')
		        ->join('estados','boletas.idEstado','=','estados.idEstado')
		        ->where('boletas.idEstado',3)
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
				$nestedData['options'] = "<div class='dropdown'>
		                        <a href='' class='dropdown-toggle card-drop' data-toggle='dropdown' aria-expanded='false'>
		                            <i class='mdi mdi-dots-horizontal font-size-18'></i>
		                        </a>
		                        <div class='dropdown-menu dropdown-menu-center'>
		                        	<a href='".asset('administrador/transacciones/boletas/validadas/detalle-boleta')."/".$boleta->idBoleta."' class='dropdown-item btn btn-info'>Detalles</a>
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
	public function exportarValidadas()
	{
        return Excel::download(new BoletasValidadasExport, 'Boletas Validadas.xlsx');
	}
}

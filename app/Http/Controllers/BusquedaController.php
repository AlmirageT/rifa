<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Comuna;
use App\Propiedad;
use App\Provincia;
use App\Region;
use App\Usuario;
use Session;

class BusquedaController extends Controller
{
	//curl
	protected function curls($request)
    {
        $nuevadireccion = urlencode($request);
        $json = "https://maps.googleapis.com/maps/api/geocode/json?address=".$nuevadireccion."&sensor=false&key=AIzaSyB9BKzI4HVxT1mjnxQIHx_8va7FBvROI6g";
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $json);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_PROXYPORT, 3128);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        $response = curl_exec($ch);
        curl_close($ch);
        $google_maps = json_decode($response);
        return response()->json($google_maps);
    }
    //busqueda de regiones provincias y comunas
    public function obtenerRegiones($idPais)
    {
        $regiones = Region::where('idPais',$idPais)->get();
        return response()->json($regiones);
    }
    public function obtenerProvincias($idRegion)
    {
        $provincias = Provincia::where('idRegion',$idRegion)->get();
        return response()->json($provincias);
    }
    public function obtenerComuna($idProvincia)
    {
        $comunas = Comuna::where('idProvincia',$idProvincia)->get();
        return response()->json($comunas);
    }
    //datatable provincias
    public function tablaProvincias(Request $request)
    {
    	$columns = array(
			0=> 'idProvincia',
			1=> 'nombreProvincia',
			2=> 'nombreRegion',
			3=> 'nombrePais',
			5=> 'options'
		);
		$totalData = Provincia::all()->count();
		$totalFiltered = $totalData;

		$limit = $request->input('length');
		$start = $request->input('start');

		if(empty($request->input('search.value')))
		{
			$provincias = Provincia::select('*')
				->join('regiones','provincias.idRegion','=','regiones.idRegion')
				->join('paises','regiones.idPais','=','paises.idPais')
				->offset($start)
				->limit($limit)
				->orderBy('idProvincia','DESC')
				->get();
		}else{
			$search = $request->input('search.value');
			$provincias = Provincia::select('*')
				->join('regiones','provincias.idRegion','=','regiones.idRegion')
				->join('paises','regiones.idPais','=','paises.idPais')
		    	->where('provincias.nombreProvincia', 'LIKE',"%{$search}%")
				->offset($start)
				->limit($limit)
				->orderBy('idProvincia','DESC')
				->get();

			$totalFiltered = Provincia::select('*')
				->join('regiones','provincias.idRegion','=','regiones.idRegion')
				->join('paises','regiones.idPais','=','paises.idPais')
		    	->where('provincias.nombreProvincia', 'LIKE',"%{$search}%")
				->count();
		}

		$data = array();
		if(!empty($provincias)){
			foreach ($provincias as $provincia){
				$nestedData['idProvincia'] = $provincia->idProvincia;
				$nestedData['nombreProvincia'] = $provincia->nombreProvincia;
				$nestedData['nombreRegion'] = $provincia->nombreRegion;
				$nestedData['nombrePais'] = $provincia->nombrePais;
				$nestedData['options'] = "<div class='dropdown'>
		                        <a href='' class='dropdown-toggle card-drop' data-toggle='dropdown' aria-expanded='false'>
		                            <i class='mdi mdi-dots-horizontal font-size-18'></i>
		                        </a>
		                        <div class='dropdown-menu dropdown-menu-right'>
		                            <a class='dropdown-item' href='".asset('administrador/ubicaciones/provincias/edit-provincia')."/".$provincia->idProvincia."'>Editar</a>
		                            <a onclick='return confirm('¿Quiere borrar el Registro ?')' class='dropdown-item' href='".asset('administrador/ubicaciones/provincias/destroy-provincia')."/".$provincia->idProvincia."'>Eliminar</a>
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
    //datable comunas
    public function tablaComunas(Request $request)
    {
    	$columns = array(
			0=> 'idComuna',
			1=> 'nombreComuna',
			2=> 'nombreProvincia',
			3=> 'nombreRegion',
			4=> 'nombrePais',
			5=> 'options'
		);
		$totalData = Comuna::all()->count();
		$totalFiltered = $totalData;

		$limit = $request->input('length');
		$start = $request->input('start');

		if(empty($request->input('search.value')))
		{
			$comunas = Comuna::select('*')
		    	->join('provincias','comunas.idProvincia','=','provincias.idProvincia')
				->join('regiones','provincias.idRegion','=','regiones.idRegion')
				->join('paises','regiones.idPais','=','paises.idPais')
				->offset($start)
				->limit($limit)
				->orderBy('idComuna','DESC')
				->get();
		}else{
			$search = $request->input('search.value');
			$comunas = Comuna::select('*')
		    	->join('provincias','comunas.idProvincia','=','provincias.idProvincia')
				->join('regiones','provincias.idRegion','=','regiones.idRegion')
				->join('paises','regiones.idPais','=','paises.idPais')
		    	->where('comunas.nombreComuna', 'LIKE',"%{$search}%")
				->offset($start)
				->limit($limit)
				->orderBy('idComuna','DESC')
				->get();

			$totalFiltered = Comuna::select('*')
		    	->join('provincias','comunas.idProvincia','=','provincias.idProvincia')
				->join('regiones','provincias.idRegion','=','regiones.idRegion')
				->join('paises','regiones.idPais','=','paises.idPais')
		    	->where('comunas.nombreComuna', 'LIKE',"%{$search}%")
				->count();
		}

		$data = array();
		if(!empty($comunas)){
			foreach ($comunas as $comuna){
				$nestedData['idComuna'] = $comuna->idComuna;
				$nestedData['nombreComuna'] = $comuna->nombreComuna;
				$nestedData['nombreProvincia'] = $comuna->nombreProvincia;
				$nestedData['nombreRegion'] = $comuna->nombreRegion;
				$nestedData['nombrePais'] = $comuna->nombrePais;
				$nestedData['options'] = "<div class='dropdown'>
		                        <a href='#' class='dropdown-toggle card-drop' data-toggle='dropdown' aria-expanded='false'>
		                            <i class='mdi mdi-dots-horizontal font-size-18'></i>
		                        </a>
		                        <div class='dropdown-menu dropdown-menu-right'>
		                            <a class='dropdown-item' href='".asset('administrador/ubicaciones/comunas/edit-comuna')."/".$comuna->idComuna."'>Editar</a>
		                            <a class='dropdown-item' href='".asset('administrador/ubicaciones/comunas/destroy-comuna')."/".$comuna->idComuna."'>Eliminar</a>
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
	
	//tabla propiedades
	public function tablaPropiedades(Request $request)
    {
    	$columns = array(
			0=> 'idPropiedad',
			1=> 'nombrePropiedad',
			2=> 'fotoPrincipal',
			3=> 'fotoMapa',
			4=> 'descripcionPropiedad',
			5=> 'mConstruidos',
			6=> 'mSuperficie',
			7=> 'mTerraza',
			8=> 'urlVideo',
			9=> 'urlMattlePort',
			10=> 'direccionPropiedad',
			11=> 'numeracionPropiedad',
			12=> 'idPais',
			13=> 'idRegion',
			14=> 'idProvincia',
			15=> 'idComuna',
			16=> 'options'
		);
		$totalData = Propiedad::select('*')
			->join('paises','propiedades.idPais','=','paises.idPais')
			->join('regiones','propiedades.idRegion','=','regiones.idRegion')
			->join('provincias','propiedades.idProvincia','=','provincias.idProvincia')
			->join('comunas','propiedades.idComuna','=','comunas.idComuna')
			->count();
		$totalFiltered = $totalData;

		$limit = $request->input('length');
		$start = $request->input('start');

		if(empty($request->input('search.value')))
		{
			$propiedades = Propiedad::select('*')
				->join('paises','propiedades.idPais','=','paises.idPais')
				->join('regiones','propiedades.idRegion','=','regiones.idRegion')
				->join('provincias','propiedades.idProvincia','=','provincias.idProvincia')
				->join('comunas','propiedades.idComuna','=','comunas.idComuna')
				->offset($start)
				->limit($limit)
				->orderBy('idPropiedad','DESC')
				->get();
		}else{
			$search = $request->input('search.value');
			$propiedades = Propiedad::select('*')
				->join('paises','propiedades.idPais','=','paises.idPais')
				->join('regiones','propiedades.idRegion','=','regiones.idRegion')
				->join('provincias','propiedades.idProvincia','=','provincias.idProvincia')
				->join('comunas','propiedades.idComuna','=','comunas.idComuna')
		    	->where('propiedades.nombrePropiedad', 'LIKE',"%{$search}%")
				->offset($start)
				->limit($limit)
				->orderBy('idPropiedad','DESC')
				->get();

			$totalFiltered = Propiedad::select('*')
				->join('paises','propiedades.idPais','=','paises.idPais')
				->join('regiones','propiedades.idRegion','=','regiones.idRegion')
				->join('provincias','propiedades.idProvincia','=','provincias.idProvincia')
				->join('comunas','propiedades.idComuna','=','comunas.idComuna')
				->where('propiedades.nombrePropiedad', 'LIKE',"%{$search}%")
				->count();
		}

		$data = array();
		if(!empty($propiedades)){
			foreach ($propiedades as $propiedad){
				$nestedData['idPropiedad'] = $propiedad->idPropiedad;
				$nestedData['nombrePropiedad'] = $propiedad->nombrePropiedad;
				if ($propiedad->fotoPrincipal != null) {
					$nestedData['fotoPrincipal'] = "<img src='".asset($propiedad->fotoPrincipal)."' width='100' height='100'>";
				}else{
					$nestedData['fotoPrincipal'] = "No tiene imagen";
				}
				if ($propiedad->fotoMapa != null) {
					$nestedData['fotoMapa'] = "<img src='".asset($propiedad->fotoMapa)."' width='100' height='100'>";
				}else{
					$nestedData['fotoMapa'] = "No tiene mapa";
				}
				$nestedData['descripcionPropiedad'] = substr($propiedad->descripcionPropiedad,0,15).'.....';
				$nestedData['mConstruidos'] = $propiedad->mConstruidos;
				$nestedData['mSuperficie'] = $propiedad->mSuperficie;
				$nestedData['mTerraza'] = $propiedad->mTerraza;
				$nestedData['urlVideo'] = $propiedad->urlVideo;
				$nestedData['urlMattlePort'] = $propiedad->urlMattlePort;
				$nestedData['direccionPropiedad'] = $propiedad->direccionPropiedad;
				$nestedData['numeracionPropiedad'] = $propiedad->numeracionPropiedad;
				$nestedData['idPais'] = $propiedad->nombrePais;
				$nestedData['idRegion'] = $propiedad->nombreRegion;
				$nestedData['idProvincia'] = $propiedad->nombreProvincia;
				$nestedData['idComuna'] = $propiedad->nombreComuna;
				$nestedData['options'] = "<div class='dropdown'>
		                        <a href='#' class='dropdown-toggle card-drop' data-toggle='dropdown' aria-expanded='false'>
		                            <i class='mdi mdi-dots-horizontal font-size-18'></i>
		                        </a>
		                        <div class='dropdown-menu dropdown-menu-right'>
									<a class='dropdown-item' href='".asset('administrador/propiedades/editar')."/".$propiedad->idPropiedad."'>Editar</a>
		                            <a class='dropdown-item' href='".asset('administrador/propiedades/destroy')."/".$propiedad->idPropiedad."'>Eliminar</a>
		                            <a class='dropdown-item' href='".asset('administrador/propiedades/imagenes')."/".$propiedad->idPropiedad."'>Agregar Imagenes</a>
		                            <a class='dropdown-item' href='".asset('administrador/propiedades/premios')."/".$propiedad->idPropiedad."'>Agregar Premios</a>
		                            <a class='dropdown-item' href='".asset('administrador/propiedades/caracteristicas')."/".$propiedad->idPropiedad."'>Agregar Caracteristicas</a>
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
	//tabla usuarios
	public function tablaUsuarios(Request $request)
    {
    	$columns = array(
			0 => 'idUsuario',
			1 => 'nombreUsuario',
			2 => 'correoUsuario',
			3 => 'telefonoUsuario',
			4 => 'rutUsuario',
			5 => 'idTipoUsuario',
			6 => 'options'
		);
		$totalData = Usuario::all()->count();
		$totalFiltered = $totalData;

		$limit = $request->input('length');
		$start = $request->input('start');

		if(empty($request->input('search.value')))
		{
			$usuarios = Usuario::select('*')
				->offset($start)
				->limit($limit)
				->orderBy('idUsuario','DESC')
				->get();
		}else{
			$search = $request->input('search.value');
			$usuarios = Usuario::select('*')
				->where('correoUsuario', 'LIKE',"%{$search}%")
		    	->orWhere('rutUsuario', 'LIKE',"%{$search}%")
		    	->orWhere('nombreUsuario', 'LIKE',"%{$search}%")
		    	->orWhere('telefonoUsuario', 'LIKE',"%{$search}%")
				->offset($start)
				->limit($limit)
				->orderBy('idUsuario','DESC')
				->get();

			$totalFiltered = Usuario::select('*')
				->where('correoUsuario', 'LIKE',"%{$search}%")
				->orWhere('rutUsuario', 'LIKE',"%{$search}%")
				->orWhere('nombreUsuario', 'LIKE',"%{$search}%")
				->orWhere('telefonoUsuario', 'LIKE',"%{$search}%")
				->count();
		}

		$data = array();
		if(!empty($usuarios)){
			foreach ($usuarios as $usuario){
				$nestedData['idUsuario'] = $usuario->idUsuario;
				$nestedData['nombreUsuario'] = $usuario->nombreUsuario;
				$nestedData['correoUsuario'] = $usuario->correoUsuario;
				$nestedData['telefonoUsuario'] = $usuario->telefonoUsuario;
				$nestedData['rutUsuario'] = $usuario->rutUsuario;
				if($usuario->idTipoUsuario == NULL){
					$nestedData['idTipoUsuario'] = 'Comprador';
				}else{
					$nestedData['idTipoUsuario'] = 'Administrador';
				}
				$nestedData['options'] = "<div class='dropdown'>
		                        <a href='#' class='dropdown-toggle card-drop' data-toggle='dropdown' aria-expanded='false'>
		                            <i class='mdi mdi-dots-horizontal font-size-18'></i>
		                        </a>
		                        <div class='dropdown-menu dropdown-menu-right'>
									<a class='dropdown-item' href='".asset('administrador/usuarios/edit')."/".$usuario->idUsuario."'>Editar</a>
		                            <a class='dropdown-item' href='".asset('administrador/usuarios/destroy')."/".$usuario->idUsuario."'>Eliminar</a>
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
	

}

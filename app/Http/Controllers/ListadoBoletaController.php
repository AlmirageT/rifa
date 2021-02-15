<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Database\QueryException;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Crypt;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\BoletasExport;
use App\Mail\EnvioBoleta;
use App\Boleta;
use App\Numero;
use App\Usuario;
use App\BoletaPropiedad;
use App\Propiedad;
use Session;
use QrCode;
use Mail;
use PDF;
use DB;
use PDFTC;
use Redirect;

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
		

		if(empty($request->input('search.value')))
		{
			$boletas = Boleta::select('*')
		        ->join('usuarios','boletas.idUsuario','=','usuarios.idUsuario')
		        ->join('estados','boletas.idEstado','=','estados.idEstado')
				->offset($start)
				->limit($limit)
				->orderBy('boletas.idBoleta','desc')
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
				->orderBy('boletas.idBoleta','desc')
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
				if ($boleta->idEstado == 2) {
					$nestedData['options'] = "<div class='dropdown'>
		                        <a href='' class='dropdown-toggle card-drop' data-toggle='dropdown' aria-expanded='false'>
		                            <i class='mdi mdi-dots-horizontal font-size-18'></i>
		                        </a>
		                        <div class='dropdown-menu dropdown-menu-center'>
		                        	<a href='".asset('administrador/transacciones/boletas/detalle-boleta')."/".$boleta->idBoleta."' class='dropdown-item btn btn-info'>Detalles</a>
		                        	<a href='".asset('administrador/transacciones/boletas/enviar-boleta')."/".$boleta->idBoleta."' class='dropdown-item btn btn-info'>Enviar Boleta</a>
		                        	<a href='".asset('administrador/transacciones/boletas/liberar-boleta')."/".$boleta->idBoleta."' class='dropdown-item btn btn-info'>Liberar Boleta</a>
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
		                        	<a href='".asset('administrador/transacciones/boletas/validadas/reenviar-boleta')."/".$boleta->idBoleta."/".$boleta->idUsuario."' class='dropdown-item btn btn-info'>Reenviar Ticket</a>
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
			$usuario = Usuario::find($boleta->idUsuario);
			$boletasPropiedades = BoletaPropiedad::where('idBoleta',$idBoleta)->get();

			$idPropiedad = array();
			foreach($boletasPropiedades as $boletaPropiedad){
				$array = array(
					'idPropiedad' => $boletaPropiedad->idPropiedad
				);
				array_push($idPropiedad,$array);
			}
			
			$propiedad = Propiedad::whereIn('idPropiedad',$idPropiedad)->get();
			
			
			//return view('admin.boletas.pdf',compact('boleta','numeros'));
            Boleta::where('idBoleta', $idBoleta)->update([
            	'idEstado'=>3
            ]);
            Numero::where('idBoleta',$idBoleta)->update([
	        	'idEstado'=>3
	        ]);
			$direccion = asset('comprobar/boleta')."/".Crypt::encrypt($boleta->idBoleta);
			$qr = QrCode::format('png')->size(200)->generate($direccion);
			//$pdf = PDF::loadView('admin.boletas.pdf',compact('boleta','numeros','qr','usuario','propiedad'));
			$certificate = 'file://'.base_path().'/public/certificado/certificadoRifo.crt';
			$key = 'file://'.base_path().'/public/certificado/llaveNoEncriptada.key';
			$info = array(
				'Name' => 'RIFOPOLY',
				'Location' => 'Tobalaba 4067',
				'Reason' => 'Validacion Compra',
				'ContactInfo' => 'https://rifopoly.com/',
			);
			PDFTC::setSignature($certificate, $key, 'tcpdfdemo', '', 2, $info);
			PDFTC::SetTitle('Comprobante de Venta.pdf');
			PDFTC::AddPage();
			$text = view('admin.boletas.pdf2',compact('boleta','numeros','qr','usuario','propiedad'));
			PDFTC::writeHTML($text, true, false, true, false, '');

			$img_base64_encoded = 'data:image/png;base64,'.base64_encode($qr);
			$img = '<img src="@' . preg_replace('#^data:image/[^;]+;base64,#', '', $img_base64_encoded) . '">';
			PDFTC::writeHTML($img, true, false, true, false, '');
			
			PDFTC::setSignatureAppearance(180, 60, 15, 15);
			$fileatt = PDFTC::Output('Comprobante de Venta.pdf', 'S');
			Mail::to($usuario->correoUsuario)->bcc(['pauloberrios@gmail.com','tickets@rifopoly.com','lina.di@isbast.com','ivan.saez@informatica.isbast.com'])->send(new EnvioBoleta($boleta, $numeros, $fileatt, $usuario,$propiedad));

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
    public function liberarBoleta($idBoleta)
    {
    	if (!Session::has('correoUsuario') || !Session::has('rutUsuario') || !Session::has('idTipoUsuario') || !Session::has('idUsuario') || !Session::has('nombreUsuario')) {
            return abort(401);
        }
        Boleta::where('idBoleta', $idBoleta)->update([
        	'idEstado'=>4
        ]);
        Numero::where('idBoleta',$idBoleta)->update([
        	'idBoleta'=>NULL,
        	'idEstado'=>1
        ]);
        toastr()->info('Boleta liberada y números disponibles');
		return back();
	}
	public function exportarCompradas()
	{
        return Excel::download(new BoletasExport, 'Boletas Compradas.xlsx');
	}
	public function crearBoleta()
	{
		if (!Session::has('correoUsuario') || !Session::has('rutUsuario') || !Session::has('idTipoUsuario') || !Session::has('idUsuario') || !Session::has('nombreUsuario')) {
            return abort(401);
        }
		$propiedades = Propiedad::where('idEstado',7)->get();
		return view('admin.boletas.create',compact('propiedades'));
	}
	public function store(Request $request)
	{
		try {
            $validator = Validator::make($request->all(), [
                'nombreUsuario' => 'required',
                'correoUsuario' => 'required',
                'telefonoUsuario' => 'required',
                'rutUsuario' => 'required',
                'cantidadNumeros' => 'required',
                'idPropiedad' => 'required'
            ]);
            if ($validator->fails()) {
                toastr()->info('Tienen que estar todos los datos llenos');
                return back();
            }
            DB::beginTransaction();
			$usuario = new Usuario();
			$usuario->nombreUsuario = $request->nombreUsuario;
			$usuario->correoUsuario = $request->correoUsuario;
			$usuario->telefonoUsuario = $request->telefonoUsuario;
			$usuario->rutUsuario = $request->rutUsuario;
			$usuario->save();

			$propiedad = Propiedad::find($request->idPropiedad);

			$boleta = new Boleta();
			$boleta->totalBoleta = ($propiedad->valorRifa * $request->cantidadNumeros);
			$boleta->idUsuario = $usuario->idUsuario;
			$boleta->idEstado = 3;
			$boleta->save();

			$boletaPropiedad = new BoletaPropiedad();
			$boletaPropiedad->idPropiedad = $request->idPropiedad;
			$boletaPropiedad->idBoleta = $boleta->idBoleta;
			$boletaPropiedad->save();

			for ($i=0; $i < $request->cantidadNumeros; $i++) { 
				$numero = Numero::where('idPropiedad',$request->idPropiedad)->where('idEstado', 1)->first()->update([
					'idBoleta' => $boleta->idBoleta,
					'idEstado' => 3
				]);
			}
			$numeros = Numero::where('idBoleta',$boleta->idBoleta)->get();

			$direccion = asset('comprobar/boleta')."/".Crypt::encrypt($boleta->idBoleta);
			$qr = QrCode::format('png')->size(200)->generate($direccion);
			//$pdf = PDF::loadView('admin.boletas.pdf',compact('boleta','numeros','qr','usuario','propiedad'));
			$certificate = 'file://'.base_path().'/public/certificado/certificadoRifo.crt';
			$key = 'file://'.base_path().'/public/certificado/llaveNoEncriptada.key';
			$info = array(
				'Name' => 'RIFOPOLY',
				'Location' => 'Tobalaba 4067',
				'Reason' => 'Validacion Compra',
				'ContactInfo' => 'https://rifopoly.com/',
			);
			PDFTC::setSignature($certificate, $key, 'tcpdfdemo', '', 2, $info);
			PDFTC::SetTitle('Comprobante de Venta.pdf');
			PDFTC::AddPage();
			$text = view('admin.boletas.pdf2',compact('boleta','numeros','qr','usuario','propiedad'));
			PDFTC::writeHTML($text, true, false, true, false, '');

			$img_base64_encoded = 'data:image/png;base64,'.base64_encode($qr);
			$img = '<img src="@' . preg_replace('#^data:image/[^;]+;base64,#', '', $img_base64_encoded) . '">';
			PDFTC::writeHTML($img, true, false, true, false, '');
			
			PDFTC::setSignatureAppearance(180, 60, 15, 15);
			$fileatt = PDFTC::Output('Comprobante de Venta.pdf', 'S');
			Mail::to($usuario->correoUsuario)->bcc(['pauloberrios@gmail.com','tickets@rifopoly.com','lina.di@isbast.com','ivan.saez@informatica.isbast.com'])->send(new EnvioBoleta($boleta, $numeros, $fileatt, $usuario,$propiedad));

            toastr()->success('El ticket se ha enviado de forma correcta', 'Enviado Correctamente');
            DB::commit();
            return redirect::to('administrador/transacciones/boletas');
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
        } catch (Exception $e) {
            DB::rollback();         
            toastr()->error('Ha surgido un error inesperado', $e->getMessage(), ['timeOut' => 9000]);
            return redirect::back();
        }
	}
	
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\BoletasValidadasExport;
use App\Mail\EnvioBoleta;
use App\Boleta;
use App\Propiedad;
use App\Usuario;
use App\Numero;
use App\BoletaPropiedad;
use QrCode;
use PDFTC;
use Mail;
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
			6=> 'created_at',
			7=> 'options'
		);
		$totalData = Boleta::select('boletas.*','usuarios.*','estados.*','boletas.created_at as fechaCompra')
		        ->join('usuarios','boletas.idUsuario','=','usuarios.idUsuario')
		        ->join('estados','boletas.idEstado','=','estados.idEstado')
		        ->where('boletas.idEstado',3)
		        ->count();
		$totalFiltered = $totalData;

		$limit = $request->input('length');
		$start = $request->input('start');

		if(empty($request->input('search.value')))
		{
			$boletas = Boleta::select('boletas.*','usuarios.*','estados.*','boletas.created_at as fechaCompra')
		        ->join('usuarios','boletas.idUsuario','=','usuarios.idUsuario')
		        ->join('estados','boletas.idEstado','=','estados.idEstado')
		        ->where('boletas.idEstado',3)
				->offset($start)
				->limit($limit)
				->orderBy('boletas.idBoleta','desc')
				->get();
		}else{
			$search = $request->input('search.value');
			$boletas = Boleta::select('boletas.*','usuarios.*','estados.*','boletas.created_at as fechaCompra')
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

			$totalFiltered = Boleta::select('boletas.*','usuarios.*','estados.*','boletas.created_at as fechaCompra')
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
				$nestedData['created_at'] = date("d-m-Y",strtotime($boleta->fechaCompra));
				$nestedData['options'] = "<div class='dropdown'>
		                        <a href='' class='dropdown-toggle card-drop' data-toggle='dropdown' aria-expanded='false'>
		                            <i class='mdi mdi-dots-horizontal font-size-18'></i>
		                        </a>
		                        <div class='dropdown-menu dropdown-menu-center'>
		                        	<a href='".asset('administrador/transacciones/boletas/validadas/detalle-boleta')."/".$boleta->idBoleta."' class='dropdown-item btn btn-info'>Detalles</a>
		                        	<a href='".asset('administrador/transacciones/boletas/validadas/reenviar-boleta')."/".$boleta->idBoleta."/".$boleta->idUsuario."' class='dropdown-item btn btn-info'>Reenviar Ticket</a>
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
	public function reeviar($idBoleta, $idUsuario)
	{
		$boleta = Boleta::find($idBoleta);
        $numeros = Numero::where('idBoleta',$idBoleta)->get();
        $direccion = asset('comprobar/boleta')."/".Crypt::encrypt($boleta->idBoleta);
        $qr = QrCode::format('png')->size(200)->generate($direccion);
        $usuario = Usuario::find($idUsuario);
        $boletasPropiedades = BoletaPropiedad::where('idBoleta',$idBoleta)->get();
        $idPropiedad = array();
        foreach($boletasPropiedades as $boletaPropiedad){
            $array = array(
                'idPropiedad' => $boletaPropiedad->idPropiedad
            );
            array_push($idPropiedad,$array);
        }
        $propiedad = Propiedad::whereIn('idPropiedad',$idPropiedad)->get();
        // set certificate file
        //return view('admin.boletas.pdf2',compact('boleta','numeros','qr','usuario','propiedad'));

        $certificate = 'file://'.base_path().'/public/certificado/certificadoRifo.crt';
        $key = 'file://'.base_path().'/public/certificado/llaveNoEncriptada.key';
        $info = array(
            'Name' => 'RIFOPOLY',
            'Location' => 'Tobalaba 4067',
            'Reason' => 'Validacion Compra',
            'ContactInfo' => 'https://rifopoly.com/',
        );
        PDFTC::setSignature($certificate, $key, 'tcpdfdemo', '', 2, $info);
        PDFTC::setHeaderCallback(function($pdf)
        {
            $style = array(
                'vpadding' => 'auto',
                'hpadding' => 'auto',
                'fgcolor' => array(0,0,0),
                'bgcolor' => false,
                'module_width' => 1,
                'module_height' => 1
            );
            $image_file = base_path().'/public/images/variantes logo rifopoly-05.png';
            $pdf->Image($image_file, 15, 10, 48, '', 'PNG', '', 'T', false, 500, '', false, false, 0, false, false, false);
        });
        //PDFTC::SetFont('helvetica', '', 12);
        PDFTC::SetTitle('Comprobante de Venta.pdf');
        PDFTC::AddPage();
        
        PDFTC::SetMargins(10, 35, 10, true);
        PDFTC::SetProtection(array('modify'));

        // print a line of text
        $text = view('admin.boletas.pdf2',compact('boleta','numeros','qr','usuario','propiedad'));

        // add view content
        PDFTC::writeHTML($text, true, false, true, false, '');
        $img_base64_encoded = 'data:image/png;base64,'.base64_encode($qr);

        $img = '<p align="center"><img src="@' . preg_replace('#^data:image/[^;]+;base64,#', '', $img_base64_encoded) . '"></p>';

        PDFTC::writeHTML($img, true, false, true, false, '');
        //PDFTC::writeHTML($text, true, 0, true, 0);
        // define active area for signature appearance
        PDFTC::setSignatureAppearance(180, 60, 15, 15);
        
        // save pdf file
        $fileatt = PDFTC::Output('Comprobante de Venta.pdf', 'S');
        
        Mail::to($usuario->correoUsuario)->bcc(['pauloberrios@gmail.com','tickets@rifopoly.com','lina.di@isbast.com','ivan.saez@informatica.isbast.com'])->send(new EnvioBoleta($boleta, $numeros, $fileatt, $usuario,$propiedad));

		toastr()->success('El ticket se ha enviado de forma correcta', 'Enviado Correctamente');
		return back();

	}
}

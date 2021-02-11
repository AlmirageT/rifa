<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Database\QueryException;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Validator;
use App\Mail\NumerosFolio;
use App\ImagenPropiedad;
use App\PropiedadCaracteristica;
use App\BoletaPropiedad;
use App\Premio;
use App\Propiedad;
use App\Pais;
use App\Comuna;
use App\Provincia;
use App\Region;
use App\Numero;
use App\Usuario;
use App\Boleta;
use DateTime;
use Session;
use Redirect;
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
    public function index(Request $request)
    {
    	try {
            $propiedad = Propiedad::select('*')
                ->join('paises','propiedades.idPais','=','paises.idPais')
                ->join('regiones','propiedades.idRegion','=','regiones.idRegion')
                ->join('comunas','propiedades.idComuna','=','comunas.idComuna')
                ->join('provincias','propiedades.idProvincia','=','provincias.idProvincia')
                ->where('propiedades.idPropiedad',(Crypt::decrypt($request->idPropiedad)))
                ->where('propiedades.idEstado',7)
                ->firstOrFail();
            $propiedadCaracteristicas = PropiedadCaracteristica::select('*')
                ->join('tipos_caracteristicas','propiedades_caracteristicas.idTipoCaracteristica','=','tipos_caracteristicas.idTipoCaracteristica')
                ->where('idPropiedad',Crypt::decrypt($request->idPropiedad))
                ->get();
            $imagenesPropiedad = ImagenPropiedad::where('idPropiedad',Crypt::decrypt($request->idPropiedad))->get();
            $portada1 = $imagenesPropiedad->shift();
            $portada2 = $imagenesPropiedad->shift();
            $premios = Premio::select('*')
            ->join('tipos_premios','premios.idTipoPremio','=','tipos_premios.idTipoPremio')
            ->where('idPropiedad',(Crypt::decrypt($request->idPropiedad)))->get();
            $paises = Pais::all();
            $regiones = Region::all();
            $provincias = Provincia::all();
            $comunas = Comuna::all();
            $url = asset('rifo-propiedades/detalle')."?idPropiedad=".$request->idPropiedad;
            return view('rifa',compact('propiedad','propiedadCaracteristicas','imagenesPropiedad','portada1','portada2','premios','paises','regiones','provincias','comunas','url'));
        } catch (ModelNotFoundException $e) {
            toastr()->warning('La propiedad solicitada esta cerrada');
            return back();
        } catch (QueryException $e) {
            toastr()->warning('Ha ocurrido un error, favor intente nuevamente' . $e->getMessage());
            return back();
        } catch (DecryptException $e) {
            toastr()->info('La propiedad solicitada esta cerrada');
            return back();
        } catch (Exception $e) {
            toastr()->error('Ha surgido un error inesperado', $e->getMessage(), ['timeOut' => 9000]);
            return redirect::back();
        }
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
                'nombreUsuario'=>'required'
            ]);
            if ($validator->fails()) {
                toastr()->info('Todos los datos deben estar llenos');
                return back();
            }
            DB::beginTransaction();
            $date = new DateTime();
            $date->modify('+48 hours');

            if(Session::has('carritoCompra')){
                $usuario = Usuario::create([
                    'nombreUsuario' => $request->nombreUsuario,
                    'correoUsuario' => $request->correoUsuario,
                    'telefonoUsuario' => $request->telefonoUsuario,
                    'rutUsuario' => $request->rutUsuario
                ]);
                if(Session::has('usuarioComprador')){
                    Session::forget('usuarioComprador');
                }
                Session::put('usuarioComprador',$usuario->idUsuario);
                

                if(count(Session::get('carritoCompra'))>1){
                    
                    $boleta = Boleta::create([
                        'totalBoleta' => Session::get('total'),
                        'fechaVencimiento' => $date->format('Y-m-d H:i:s'),
                        'idUsuario' => $usuario->idUsuario,
                        'idEstado' => 2
                    ]);
                    foreach (Session::get('carritoCompra') as $carrito) {
                        if($carrito['cantidad'] == 1){
                            $numeros = Numero::where('idPropiedad',$carrito['idPropiedad'])->where('idEstado', 1)->first()->update([
                                'idBoleta' => $boleta->idBoleta,
    		    		        'idEstado' => 2
                            ]);
                        }else if($carrito['cantidad'] > 1){
                            for ($i=0; $i < $carrito['cantidad']; $i++) { 
                                $numeros = Numero::where('idPropiedad',$carrito['idPropiedad'])->where('idEstado', 1)->first()->update([
                                    'idBoleta' => $boleta->idBoleta,
                                    'idEstado' => 2
                                ]);
                            }
                        }
                        BoletaPropiedad::create([
                            'idPropiedad' => $carrito['idPropiedad'],
                            'idBoleta' => $boleta->idBoleta
                        ]);
                    }

                }else if(count(Session::get('carritoCompra')) == 1){
                    foreach (Session::get('carritoCompra') as $carrito) {
                        $boleta = Boleta::create([
                            'totalBoleta' => Session::get('total'),
                            'fechaVencimiento' => $date->format('Y-m-d H:i:s'),
                            'idUsuario' => $usuario->idUsuario,
                            'idEstado' => 2
                        ]);

                        if($carrito['cantidad'] == 1){
                            $numeros = Numero::where('idPropiedad',$carrito['idPropiedad'])->where('idEstado', 1)->first()->update([
                                'idBoleta' => $boleta->idBoleta,
    		    		        'idEstado' => 2
                            ]);
                        }else if($carrito['cantidad'] > 1){
                            for ($i=0; $i < $carrito['cantidad']; $i++) { 
                                $numeros = Numero::where('idPropiedad',$carrito['idPropiedad'])->where('idEstado', 1)->first()->update([
                                    'idBoleta' => $boleta->idBoleta,
                                    'idEstado' => 2
                                ]);
                            }
                        }
                        BoletaPropiedad::create([
                            'idPropiedad' => $carrito['idPropiedad'],
                            'idBoleta' => $boleta->idBoleta
                        ]);
                    }
                }
                Session::forget('carritoCompra');
                Session::forget('total');

                DB::commit();

                return redirect()->to('https://otrospagos.com/publico/portal/enlace?id='.getenv('OTROS_PAGOS_COVENIO').'&idcli='.$boleta->idBoleta.'&tiidc=03');
            }else{
                DB::rollback();
                toastr()->warning('Su compra ya ha sido procesada o no ha realizado compra');
                return back();
            }

            //Mail::to($usuario->correoUsuario)->bcc(['pauloberrios@gmail.com', 'ivan.saez@informatica.isbast.com','lina.di@isbast.com'])->send(new ConfirmarSolicitud($boleta, $numerosComprados, $total));
	    	//Mail::to('tickets@rifomipropiedad.com')->bcc(['pauloberrios@gmail.com', 'ivan.saez@informatica.isbast.com','lina.di@isbast.com'])->send(new NumerosFolio($boleta, $numerosComprados, $total,$usuario));
	    	//return view('datos',compact('numerosComprados','total'));
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

    public function reversarEstadoDeNoPagados()
    {
        $boletas = Boleta::where('idEstado', 2)->get();
        foreach ($boletas as $boleta) {
            if(date('d-m-Y',strtotime($boleta->fechaVencimiento)) == date('d-m-Y') ){
                $boleta->update([
                    'idEstado'=>4
                ]);
                Numero::where('idBoleta',$boleta->idBoleta)->update([
                    'idEstado'=>1,
                    'idBoleta'=>null
                ]);
            }
        }
    }
    public function estadoBoleta()
    {
        $boleta = Boleta::where('idUsuario',Session::get('usuarioComprador'))->first();
        $dato = false;
        if($boleta->idEstado == 3){
            $dato = true;
            Session::forget('usuarioComprador');
        }
        return response()->json($dato);
    }
}

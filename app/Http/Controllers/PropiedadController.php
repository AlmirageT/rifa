<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Database\QueryException;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Validator;
use App\Propiedad;
use App\Premio;
use App\ImagenPropiedad;
use App\Pais;
use App\Comuna;
use App\Provincia;
use App\Region;
use App\Estado;
use App\Numero;
use App\PropiedadCaracteristica;
use Session;
use Image;
use DB;
use Log;

class PropiedadController extends Controller
{
    public function index()
    {
        if (!Session::has('idUsuario') && !Session::has('idTipoUsuario') && !Session::has('nombre') && !Session::has('apellido') && !Session::has('correo') && !Session::has('rut')) {
            return abort(401);
        }
    	return view('admin.propiedades.index');
    }
    public function create()
    {
        if (!Session::has('idUsuario') && !Session::has('idTipoUsuario') && !Session::has('nombre') && !Session::has('apellido') && !Session::has('correo') && !Session::has('rut')) {
            return abort(401);
        }
        $paises = Pais::all();
        $regiones = Region::all();
        $provincias = Provincia::all();
        $comunas = Comuna::all();
        $estados = Estado::where('idTipoEstado',2)->get();
        
    	return view('admin.propiedades.create',compact('paises','regiones','provincias','comunas','estados'));
    }
    public function store(Request $request)
    {
        
    	try {
            $validator = Validator::make($request->all(), [
                'nombrePropiedad' => 'required',
                'fotoPrincipal' => 'max:102400|required',
                'descripcionPropiedad' => 'required',
                'mConstruidos' => 'required',
                'mSuperficie' => 'required',
                'mTerraza' => 'required',
                'direccionPropiedad' => 'required',
                'numeracionPropiedad' => 'required',
                'codigoPostal' => 'required',
                'latitud' => 'required',
                'longitud' => 'required',
                'idPais' => 'required',
                'idRegion' => 'required',
                'idProvincia' => 'required',
                'idComuna' => 'required',
                'idEstado' => 'required',
                'cantidadNumeros' => 'required'
            ]);
            if ($validator->fails()) {
                toastr()->info('El archivo no puede pasar de los 100MB');
                return back();
            }
            DB::beginTransaction();
            $propiedad = new Propiedad($request->all());
            if($request->file('fotoPrincipal')){
                $imagen = $request->file('fotoPrincipal');
                $img = Image::make($imagen);
                $imgName = uniqid().'.'.$imagen->getClientOriginalExtension();
                $img->save('assets/images/propiedades/'.$imgName);
                $propiedad->fotoPrincipal = 'assets/images/propiedades/'.$imgName;
            }
            if($request->file('urlVideo')){
                $video = $request->file('urlVideo');
                $videoName = uniqid().'.'.$video->getClientOriginalExtension();
                $video->move('assets/videos/',$videoName);
                $propiedad->urlVideo = 'assets/videos/'.$videoName;
            }
            if($request->file('pdfBasesLegales')){
                $pdf = $request->file('pdfBasesLegales');
                $pdfName = uniqid().'.'.$pdf->getClientOriginalExtension();
                $pdf->move('assets/pdf/',$pdfName);
                $propiedad->pdfBasesLegales = 'assets/pdf/'.$pdfName;
            }
            if($request->tieneMapa == 'on'){
                $propiedad->urlGoogleMaps = 1;
            }
            $geoHash = DB::select("SELECT ST_GeoHash($request->longitud, $request->latitud, 16) as geoHash");
            $linkMapa = "https://maps.googleapis.com/maps/api/staticmap?center=".$request->latitud.",".$request->longitud."&zoom=16&size=380x377&markers=color:blue%7Clabel:S%7C".$request->latitud.",".$request->longitud."&key=AIzaSyB9BKzI4HVxT1mjnxQIHx_8va7FBvROI6g";
            $mapa = Image::make($linkMapa);
            $mapaNombre = uniqid();
            $mapa->save('assets/images/propiedades/'.$mapaNombre);
            $propiedad->fotoMapa = 'assets/images/propiedades/'.$mapaNombre;
            $propiedad->poi = $geoHash[0]->geoHash;
            $propiedad->save();

            for ($i=0; $i < $request->cantidadNumeros; $i++) { 
                Numero::create([
                    'numero' => $i+1,
                    'valorNumero' => $request->valorRifa,
                    'idEstado' => 1,
                    'idPropiedad' => $propiedad->idPropiedad
                ]);
            }

            toastr()->success('Agregado Correctamente', 'La propiedad: '.$request->nombrePropiedad.' ha sido agregado correctamente');
            DB::commit();
            return redirect::to('administrador/propiedades');
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
    public function edit($idPropiedad)
    {
        if (!Session::has('idUsuario') && !Session::has('idTipoUsuario') && !Session::has('nombre') && !Session::has('apellido') && !Session::has('correo') && !Session::has('rut')) {
            return abort(401);
        }
        $propiedad = Propiedad::find($idPropiedad);
        $paises = Pais::all();
        $regiones = Region::all();
        $provincias = Provincia::all();
        $comunas = Comuna::all();
        $estados = Estado::where('idTipoEstado',2)->get();
        $numeros = Numero::where('idPropiedad',$idPropiedad)->get();
    	return view('admin.propiedades.edit',compact('paises','regiones','provincias','comunas','estados','propiedad','numeros'));
    }
    public function update(Request $request, $idPropiedad)
    {
    	try {
            $validator = Validator::make($request->all(), [
                'nombrePropiedad' => 'required',
                'fotoPrincipal' => 'max:102400',
                'descripcionPropiedad' => 'required',
                'mConstruidos' => 'required',
                'mSuperficie' => 'required',
                'mTerraza' => 'required',
                'direccionPropiedad' => 'required',
                'numeracionPropiedad' => 'required',
                'codigoPostal' => 'required',
                'latitud' => 'required',
                'longitud' => 'required',
                'idPais' => 'required',
                'idRegion' => 'required',
                'idProvincia' => 'required',
                'idComuna' => 'required',
                'idEstado' => 'required'
            ]);
            if ($validator->fails()) {
                toastr()->info('El archivo no puede pasar de los 100MB');
                return back();
            }
            DB::beginTransaction();
            $propiedad = Propiedad::find($idPropiedad);
            if($request->file('fotoPrincipal')){
                if($propiedad->fotoPrincipal != null){
                    unlink($propiedad->fotoPrincipal);
                }
                $imagen = $request->file('fotoPrincipal');
                $img = Image::make($imagen);
                $imgName = uniqid().'.'.$imagen->getClientOriginalExtension();
                $img->save('assets/images/propiedades/'.$imgName);
                $propiedad->fotoPrincipal = 'assets/images/propiedades/'.$imgName;
            }
            if($request->file('urlVideo')){
                if($propiedad->urlVideo != null){
                    unlink($propiedad->urlVideo);
                }
                $video = $request->file('urlVideo');
                $videoName = uniqid().'.'.$video->getClientOriginalExtension();
                $video->move('assets/videos/',$videoName);
                $propiedad->urlVideo = 'assets/videos/'.$videoName;
            }
            if($request->file('pdfBasesLegales')){
                if($propiedad->pdfBasesLegales != null){
                    unlink($propiedad->pdfBasesLegales);
                }
                $pdf = $request->file('pdfBasesLegales');
                Log::info($pdf);
                $pdfName = uniqid().'.'.$pdf->getClientOriginalExtension();
                Log::info($pdfName);

                $pdf->move('assets/pdf/',$pdfName);
                $propiedad->pdfBasesLegales = 'assets/pdf/'.$pdfName;
            }
            if($propiedad->fotoMapa != null){
                unlink($propiedad->fotoMapa);
            }
            $propiedad->nombrePropiedad = $request->nombrePropiedad;
            $propiedad->descripcionPropiedad = $request->descripcionPropiedad;
            $propiedad->mConstruidos = $request->mConstruidos;
            $propiedad->mSuperficie = $request->mSuperficie;
            $propiedad->mTerraza = $request->mTerraza;
            $propiedad->urlMattlePort = $request->urlMattlePort;
            $propiedad->direccionPropiedad = $request->direccionPropiedad;
            $propiedad->numeracionPropiedad = $request->numeracionPropiedad;
            $propiedad->codigoPostal = $request->codigoPostal;
            $propiedad->latitud = $request->latitud;
            $propiedad->longitud = $request->longitud;
            $propiedad->urlFacebook = $request->urlFacebook;
            $propiedad->urlInstagram = $request->urlInstagram;
            $propiedad->valorRifa = $request->valorRifa;
            $propiedad->descripcionDetalle = $request->descripcionDetalle;
            $propiedad->subtituloPropiedad = $request->subtituloPropiedad;
            $propiedad->idPais = $request->idPais;
            $propiedad->idRegion = $request->idRegion;
            $propiedad->idProvincia = $request->idProvincia;
            $propiedad->idComuna = $request->idComuna;
            $propiedad->idEstado = $request->idEstado;
            if($request->tieneMapa){
                $propiedad->urlGoogleMaps = 1;
            }

            $propiedad->cantidadTotalPremios = $request->cantidadTotalPremios;
            $geoHash = DB::select("SELECT ST_GeoHash($request->longitud, $request->latitud, 16) as geoHash");
            $linkMapa = "https://maps.googleapis.com/maps/api/staticmap?center=".$request->latitud.",".$request->longitud."&zoom=16&size=380x377&markers=color:blue%7Clabel:S%7C".$request->latitud.",".$request->longitud."&key=AIzaSyB9BKzI4HVxT1mjnxQIHx_8va7FBvROI6g";
            $mapa = Image::make($linkMapa);
            $mapaNombre = uniqid();
            $mapa->save('assets/images/propiedades/'.$mapaNombre);
            $propiedad->fotoMapa = 'assets/images/propiedades/'.$mapaNombre;
            $propiedad->poi = $geoHash[0]->geoHash;
            $propiedad->save();

            $numeros = Numero::where('idPropiedad',$idPropiedad)->get();

            for ($i=count($numeros); $i < $request->cantidadNumeros; $i++) { 
                Numero::create([
                    'numero' => $i+1,
                    'valorNumero' => $request->valorRifa,
                    'idEstado' => 1,
                    'idPropiedad' => $idPropiedad
                ]);
            }
            
            toastr()->success('Actualizado Correctamente', 'La propiedad: '.$request->nombrePropiedad.' ha sido actualizado correctamente');
            DB::commit();
            return redirect::to('administrador/propiedades');
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
    public function destroy($idPropiedad)
    {
    	try {
            DB::beginTransaction();
            Numero::where('idPropiedad',$idPropiedad)->delete();
            $imagenesPropiedad = ImagenPropiedad::where('idPropiedad',$idPropiedad)->get();

            if(count($imagenesPropiedad)>0){
                foreach ($imagenesPropiedad as $imagenPropiedad) {
                    unlink($imagenPropiedad->urlImagen);
                    $imagenPropiedad->delete();
                }
            }
            $premios = Premio::where('idPropiedad',$idPropiedad)->get();
            if(count($premios)>0){
                foreach ($premios as $premio) {
                    if($premio->imagenPremio){
                        unlink($premio->imagenPremio);
                        $premio->delete();
                    }else{
                        $premio->delete();
                    }
                }
            }
            $caracteristicas = PropiedadCaracteristica::where('idPropiedad',$idPropiedad)->get();
            if(count($caracteristicas)>0){
                foreach ($caracteristicas as $caracteristica) {
                    $caracteristica->delete();
                }
            }
            $propiedad = Propiedad::find($idPropiedad);
            if($propiedad->fotoPrincipal != null){
                unlink($propiedad->fotoPrincipal);
            }
            if($propiedad->fotoMapa != null){
                unlink($propiedad->fotoMapa);
            }
            if($propiedad->pdfBasesLegales != null){
                unlink($propiedad->pdfBasesLegales);
            }
            if($propiedad->urlVideo != null){
                unlink($propiedad->urlVideo);
            }
            toastr()->success('Eliminado Correctamente', 'El tipo de calidad: '.$propiedad->nombrePropiedad.' ha sido eliminado correctamente');
            $propiedad->delete();
    		DB::commit();
            return redirect::back();
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
    public function imagenes($idPropiedad)
    {
        if (!Session::has('idUsuario') && !Session::has('idTipoUsuario') && !Session::has('nombre') && !Session::has('apellido') && !Session::has('correo') && !Session::has('rut')) {
            return abort(401);
        }
        $imagenesPropiedades = ImagenPropiedad::where('idPropiedad',$idPropiedad)->get();
        return view('admin.propiedades.imagenesPropiedad',compact('idPropiedad','imagenesPropiedades'));
    }
    public function dropzone(Request $request, $idPropiedad)
    {
        $propiedad = Propiedad::select('*')
            ->join('regiones','propiedades.idRegion','=','regiones.idRegion')
            ->join('comunas','propiedades.idComuna','=','comunas.idComuna')
            ->where('propiedades.idPropiedad',$idPropiedad)
            ->firstOrFail();
        $direccionMinuscula = strtolower($propiedad->direccionPropiedad);
        $direccionGuion = str_replace(" ", "-", $direccionMinuscula);

        $comunaMinuscula = strtolower($propiedad->nombreComuna);
        $comunaGuion = str_replace(" ", "-", $comunaMinuscula);

        $regionMinuscula = strtolower($propiedad->nombreRegion);
        $regionGuion = str_replace(" ", "-", $regionMinuscula);

        if($request->file('file')){

            $imagen = $request->file('file');
			$img = Image::make($imagen);

            $imgName = uniqid().'-'.$direccionGuion.'-'.$comunaGuion.'-'.$regionGuion.'.'.$imagen->getClientOriginalExtension();
			
            $img->save('assets/images/fotosPropiedades/'.$imgName);
            
            ImagenPropiedad::create([
                'urlImagen' => 'assets/images/fotosPropiedades/'.$imgName,
		    	'idPropiedad' => $idPropiedad
            ]);
            return response()->json("Exito");
        }
        return response()->json("fallo");
    }

    //funciones para vistas publicas
    public function tienda()
    {
        $propiedades = Propiedad::select('*')
            ->join('paises','propiedades.idPais','=','paises.idPais')
            ->join('regiones','propiedades.idRegion','=','regiones.idRegion')
            ->join('comunas','propiedades.idComuna','=','comunas.idComuna')
            ->join('provincias','propiedades.idProvincia','=','provincias.idProvincia')
            ->where('propiedades.idEstado',7)
            ->orderBy('propiedades.idPropiedad','DESC')
            ->paginate(3);

        $premios = Premio::select('*')
            ->join('tipos_premios','premios.idTipoPremio','=','tipos_premios.idTipoPremio')
            ->get();
           
        return view('propiedad',compact('propiedades','premios'));
    }
    //busqueda de propiedades
	public function propiedadTienda(Request $request)
	{
        $propiedades = Propiedad::select('*')
            ->join('paises','propiedades.idPais','=','paises.idPais')
            ->join('regiones','propiedades.idRegion','=','regiones.idRegion')
            ->join('comunas','propiedades.idComuna','=','comunas.idComuna')
            ->join('provincias','propiedades.idProvincia','=','provincias.idProvincia')
            ->where('propiedades.idEstado',7)
            ->where('propiedades.nombrePropiedad', 'LIKE',"%{$request->buscadorDeRifa}%")
            ->orWhere('propiedades.direccionPropiedad', 'LIKE',"%{$request->buscadorDeRifa}%")
            ->orWhere('regiones.nombreRegion', 'LIKE',"%{$request->buscadorDeRifa}%")
            ->orWhere('comunas.nombreComuna', 'LIKE',"%{$request->buscadorDeRifa}%")
            ->orderBy('propiedades.idPropiedad','DESC')
            ->paginate(3);

        $premios = Premio::select('*')
            ->join('tipos_premios','premios.idTipoPremio','=','tipos_premios.idTipoPremio')
            ->get();
        
        return view('propiedad',compact('propiedades','premios'));
        
    }
    
    //creacion session carrito compra
    public function crearCarritoCompra($cantidad, $idPropiedad)
    {
        $numeros = Numero::where('idPropiedad',$idPropiedad)->where('idEstado',1)->first();
        if(!$numeros){
            $estadoJson = "cualquiercosa";
            return response()->json(['estadoJson' => $estadoJson]);
        }
        $propiedad = Propiedad::find($idPropiedad);
        $estadoJson = false;

        if (Session::has('carritoCompra')) {
            if(count(Session::get('carritoCompra')) < 15){
                $session = Session::get('carritoCompra');

                $arrayKey = false;
                foreach ($session as $key => $busquedaId) {
                    if($busquedaId['idPropiedad'] == $idPropiedad){
                        $arrayKey = $key;
                    }
                }
                

                if(is_numeric($arrayKey)){
                    $arrayPropiedad = $session[$arrayKey];
                    $nuevaCantidad = $arrayPropiedad['cantidad']+$cantidad;
                    $arrayCambio = array('cantidad'=>$nuevaCantidad);
                    $nuevoCarrito = array_replace($arrayPropiedad, $arrayCambio);

                    if (Session::has('total')) {
                        $array_total = Session::get('total');
                        $restaValor = $array_total - ($arrayPropiedad['valorRifa']*$arrayPropiedad['cantidad']);
                        Session::put('total',$restaValor);
                        $nuevoTotalArray = Session::get('total');
                        $total = $arrayPropiedad['valorRifa']*$nuevaCantidad;
                        $total = $nuevoTotalArray + $total;
                        Session::put('total',$total);
                        $nuevoValor = Session::get('total');
                    }
                    
                    $array = Session::get('carritoCompra');
                    foreach ($array as $key => $value) {
                        if ($key == $arrayKey) {
                            unset($array[$arrayKey]);
                            Session::put('carritoCompra', $array);
                            array_push($array, $nuevoCarrito);
                            Session::put('carritoCompra', $array);
                        }
                    }
                    $cantidadCarrito = count(Session::get('carritoCompra'));

                    if(Session::has('total') && Session::has('carritoCompra')){
                        $estadoJson = true;
                        return response()->json(['estadoJson' => $estadoJson, 'cantidadCarrito' => $cantidadCarrito]);
                    }

                }else{
                    $array = array(
                        'idPropiedad' => $idPropiedad,
                        'nombrePropiedad' => $propiedad->nombrePropiedad,
                        'valorRifa' => $propiedad->valorRifa,
                        'cantidad' => $cantidad,
                        'imagenPropiedad' => $propiedad->fotoPrincipal
                    );
                    array_push($session, $array);
                    Session::put('carritoCompra',$session);
                }
            }else{
                return response()->json(['estadoJson' => $estadoJson]);
            }
            
        }else{
            $prueba = array(0=>[
                    'idPropiedad' => $idPropiedad,
                    'nombrePropiedad' => $propiedad->nombrePropiedad,
                    'valorRifa' => $propiedad->valorRifa,
                    'cantidad' => $cantidad,
                    'imagenPropiedad' => $propiedad->fotoPrincipal
                ]
            );
            Session::put('carritoCompra',$prueba);
        }

        if (Session::has('total')) {
            $array_total = Session::get('total');
            $total = $propiedad->valorRifa*$cantidad;
            $total = $array_total + $total;
            Session::put('total',$total);
        }else{
            $total = $propiedad->valorRifa*$cantidad;
            Session::put('total',$total);
        }

        $cantidadCarrito = count(Session::get('carritoCompra'));

        if(Session::has('total') && Session::has('carritoCompra')){
            $estadoJson = true;
            return response()->json(['estadoJson' => $estadoJson, 'cantidadCarrito' => $cantidadCarrito]);
        }

        return response()->json(['estadoJson' => $estadoJson]);
    }
    public function eliminarDatoCarroCompra($idPropiedad)
    {
        $session = Session::get('carritoCompra');
        $arrayKey = 0;
        foreach ($session as $key => $busquedaId) {
            if($busquedaId['idPropiedad'] == $idPropiedad){
                $arrayKey = $key;
            }
        }
        if (Session::has('carritoCompra')) {
            if (count(Session::get('carritoCompra'))>1) {
                $array = Session::get('carritoCompra');
                foreach ($array as $key => $value) {
                    if ($key == $arrayKey) {
                        $total = $value['valorRifa'] * $value['cantidad'];
                        $array_total = Session::get('total');
                        $total = $array_total - $total;
                        Session::put('total',$total);
                        unset($array[$arrayKey]);
                        Session::put('carritoCompra', $array);
                    }
                }
            }else if(count(Session::get('carritoCompra'))==1){
                Session::forget('carritoCompra');
                Session::forget('total');
            }
        }
        toastr()->success('Eliminado Correctamente', 'Se ha eliminado el ticket solicitado');
        return back();
        
    }
    public function cambiarValorDatos($idPropiedad, $cantidad)
    {
        $session = Session::get('carritoCompra');
        $arrayKey = 0;
        foreach ($session as $key => $busquedaId) {
            if($busquedaId['idPropiedad'] == $idPropiedad){
                $arrayKey = $key;
            }
        }
        $arrayPropiedad = Session::get('carritoCompra')[$arrayKey];
        $arrayCambio = array('cantidad'=>$cantidad);
        $nuevoCarrito = array_replace($arrayPropiedad, $arrayCambio);

        if (Session::has('total')) {
            $array_total = Session::get('total');
            $restaValor = $array_total - ($arrayPropiedad['valorRifa']*$arrayPropiedad['cantidad']);
            Session::put('total',$restaValor);
            $nuevoTotalArray = Session::get('total');
            $total = $arrayPropiedad['valorRifa']*$cantidad;
            $total = $nuevoTotalArray + $total;
            Session::put('total',$total);
            $nuevoValor = Session::get('total');
        }
        
        $array = Session::get('carritoCompra');
        foreach ($array as $key => $value) {
            if ($key == $arrayKey) {
                unset($array[$arrayKey]);
                Session::put('carritoCompra', $array);
                array_push($array, $nuevoCarrito);
                Session::put('carritoCompra', $array);
            }
        }

        return response()->json(['nuevoCarrito'=>$nuevoCarrito,'nuevoValor'=>$nuevoValor]);
    }
    public function restarValorDatos($idPropiedad, $cantidad)
    {
        $session = Session::get('carritoCompra');
        $arrayKey = 0;
        foreach ($session as $key => $busquedaId) {
            if($busquedaId['idPropiedad'] == $idPropiedad){
                $arrayKey = $key;
            }
        }

        $arrayPropiedad = Session::get('carritoCompra')[$arrayKey];
        $arrayCambio = array('cantidad'=>$cantidad);
        $nuevoCarrito = array_replace($arrayPropiedad, $arrayCambio);

        if (Session::has('total')) {
            $array_total = Session::get('total');
            $restaValor = $array_total - ($arrayPropiedad['valorRifa']);
            Session::put('total',$restaValor);
            $nuevoValor = Session::get('total');
        }
        
        $array = Session::get('carritoCompra');
        foreach ($array as $key => $value) {
            if ($key == $arrayKey) {
                unset($array[$arrayKey]);
                Session::put('carritoCompra', $array);
                array_push($array, $nuevoCarrito);
                Session::put('carritoCompra', $array);
            }
        }

        return response()->json(['nuevoCarrito'=>$nuevoCarrito,'nuevoValor'=>$nuevoValor]);
    }
    public function ingresoAFormularioUsuario(Request $request, $idPropiedad)
    {
        $numeros = Numero::where('idPropiedad',$idPropiedad)->where('idEstado',1)->first();
        if(!$numeros){
            toastr()->warning('Esta propiedad aún no posee tickets asociados');
            return back();
        }
        $propiedad = Propiedad::find($idPropiedad);

        if (Session::has('carritoCompra')) {
            if(count(Session::get('carritoCompra')) < 15){
                $session = Session::get('carritoCompra');

                $arrayKey = false;
                foreach ($session as $key => $busquedaId) {
                    if($busquedaId['idPropiedad'] == $idPropiedad){
                        $arrayKey = $key;
                    }
                }
                

                if(is_numeric($arrayKey)){
                    $arrayPropiedad = $session[$arrayKey];
                    $nuevaCantidad = $arrayPropiedad['cantidad']+$request->numero;
                    $arrayCambio = array('cantidad'=>$nuevaCantidad);
                    $nuevoCarrito = array_replace($arrayPropiedad, $arrayCambio);

                    if (Session::has('total')) {
                        $array_total = Session::get('total');
                        $restaValor = $array_total - ($arrayPropiedad['valorRifa']*$arrayPropiedad['cantidad']);
                        Session::put('total',$restaValor);
                        $nuevoTotalArray = Session::get('total');
                        $total = $arrayPropiedad['valorRifa']*$nuevaCantidad;
                        $total = $nuevoTotalArray + $total;
                        Session::put('total',$total);
                        $nuevoValor = Session::get('total');
                    }
                    
                    $array = Session::get('carritoCompra');
                    foreach ($array as $key => $value) {
                        if ($key == $arrayKey) {
                            unset($array[$arrayKey]);
                            Session::put('carritoCompra', $array);
                            array_push($array, $nuevoCarrito);
                            Session::put('carritoCompra', $array);
                        }
                    }
                    $cantidadCarrito = count(Session::get('carritoCompra'));

                    if(Session::has('total') && Session::has('carritoCompra')){
                        return redirect::to('paso-final-compra-ticket');
                    }

                }else{
                    $array = array(
                        'idPropiedad' => $idPropiedad,
                        'nombrePropiedad' => $propiedad->nombrePropiedad,
                        'valorRifa' => $propiedad->valorRifa,
                        'cantidad' => $request->numero,
                        'imagenPropiedad' => $propiedad->fotoPrincipal
                    );
                    array_push($session, $array);
                    Session::put('carritoCompra',$session);
                }
            }else{
                toastr()->warning('Oops ha surgido un error');
                return back();
                
            }
            
        }else{
            $prueba = array(0=>[
                    'idPropiedad' => $idPropiedad,
                    'nombrePropiedad' => $propiedad->nombrePropiedad,
                    'valorRifa' => $propiedad->valorRifa,
                    'cantidad' => $request->numero,
                    'imagenPropiedad' => $propiedad->fotoPrincipal
                ]
            );
            Session::put('carritoCompra',$prueba);
        }

        if (Session::has('total')) {
            $array_total = Session::get('total');
            $total = $propiedad->valorRifa*$request->numero;
            $total = $array_total + $total;
            Session::put('total',$total);
        }else{
            $total = $propiedad->valorRifa*$request->numero;
            Session::put('total',$total);
        }

        $cantidadCarrito = count(Session::get('carritoCompra'));

        if(Session::has('total') && Session::has('carritoCompra')){
            return redirect::to('paso-final-compra-ticket');
        }
        toastr()->warning('Oops ha surgido un error');
        return back();
    }
}

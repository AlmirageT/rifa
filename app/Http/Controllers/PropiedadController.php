<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Database\QueryException;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Validator;
use App\Propiedad;
use App\ImagenPropiedad;
use App\Pais;
use App\Comuna;
use App\Provincia;
use App\Region;
use App\Estado;
use Session;
use Image;
use DB;

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
                'idTipoCaracteristica' => 'required'
            ]);
            if ($validator->fails()) {
                toastr()->info('El archivo no puede pasar de los 100MB');
                return back();
            }
            DB::beginTransaction();
            $propiedad = new Propiedad();
            $propiedad->nombrePropiedad = $request->nombrePropiedad;
            $propiedad->descripcionPropiedad = $request->descripcionPropiedad;
            $propiedad->mConstruidos = $request->mConstruidos;
            $propiedad->mSuperficie = $request->mSuperficie;
            $propiedad->mTerraza = $request->mTerraza;
            $propiedad->urlVideo = $request->urlVideo;
            $propiedad->urlMattlePort = $request->urlMattlePort;
            $propiedad->direccionPropiedad = $request->direccionPropiedad;
            $propiedad->numeracionPropiedad = $request->numeracionPropiedad;
            $propiedad->codigoPostal = $request->codigoPostal;
            $propiedad->latitud = $request->latitud;
            $propiedad->longitud = $request->longitud;
            $propiedad->idPais = $request->idPais;
            $propiedad->idRegion = $request->idRegion;
            $propiedad->idProvincia = $request->idProvincia;
            $propiedad->idComuna = $request->idComuna;
            $propiedad->idEstado = $request->idEstado;
            $propiedad->urlFacebook = $request->urlFacebook;
            $propiedad->urlInstagram = $request->urlInstagram;
            if($request->file('fotoPrincipal')){
                $imagen = $request->file('fotoPrincipal');
                $img = Image::make($imagen);
                $imgName = uniqid().'.'.$imagen->getClientOriginalExtension();
                $img->save('assets/images/propiedades/'.$imgName);
                $propiedad->fotoPrincipal = 'assets/images/propiedades/'.$imgName;
            }
            $geoHash = DB::select("SELECT ST_GeoHash($request->longitud, $request->latitud, 16) as geoHash");
            $linkMapa = "https://maps.googleapis.com/maps/api/staticmap?center=".$request->latitud.",".$request->longitud."&zoom=17&size=350x233&markers=color:blue%7Clabel:S%7C".$request->latitud.",".$request->longitud."&key=AIzaSyB9BKzI4HVxT1mjnxQIHx_8va7FBvROI6g";
            $mapa = Image::make($linkMapa);
            $mapaNombre = uniqid();
            $mapa->save('assets/images/propiedades/'.$mapaNombre);
            $propiedad->fotoMapa = 'assets/images/propiedades/'.$mapaNombre;
            $propiedad->poi = $geoHash[0]->geoHash;
            $propiedad->save();

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
    	return view('admin.propiedades.edit',compact('paises','regiones','provincias','comunas','estados','propiedad'));
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
                'idEstado' => 'required',
                'idTipoCaracteristica' => 'required'
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
            $propiedad->nombrePropiedad = $request->nombrePropiedad;
            $propiedad->descripcionPropiedad = $request->descripcionPropiedad;
            $propiedad->mConstruidos = $request->mConstruidos;
            $propiedad->mSuperficie = $request->mSuperficie;
            $propiedad->mTerraza = $request->mTerraza;
            $propiedad->urlVideo = $request->urlVideo;
            $propiedad->urlMattlePort = $request->urlMattlePort;
            $propiedad->direccionPropiedad = $request->direccionPropiedad;
            $propiedad->numeracionPropiedad = $request->numeracionPropiedad;
            $propiedad->codigoPostal = $request->codigoPostal;
            $propiedad->latitud = $request->latitud;
            $propiedad->longitud = $request->longitud;
            $propiedad->idPais = $request->idPais;
            $propiedad->idRegion = $request->idRegion;
            $propiedad->idProvincia = $request->idProvincia;
            $propiedad->idComuna = $request->idComuna;
            $propiedad->idEstado = $request->idEstado;
            $propiedad->urlFacebook = $request->urlFacebook;
            $propiedad->urlInstagram = $request->urlInstagram;
            $geoHash = DB::select("SELECT ST_GeoHash($request->longitud, $request->latitud, 16) as geoHash");
            $linkMapa = "https://maps.googleapis.com/maps/api/staticmap?center=".$request->latitud.",".$request->longitud."&zoom=17&size=350x233&markers=color:blue%7Clabel:S%7C".$request->latitud.",".$request->longitud."&key=AIzaSyB9BKzI4HVxT1mjnxQIHx_8va7FBvROI6g";
            $mapa = Image::make($linkMapa);
            $mapaNombre = uniqid();
            $mapa->save('assets/images/propiedades/'.$mapaNombre);
            $propiedad->fotoMapa = 'assets/images/propiedades/'.$mapaNombre;
            $propiedad->poi = $geoHash[0]->geoHash;
            $propiedad->save();
            
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
            $propiedad = Propiedad::find($idPropiedad);
            if($propiedad->fotoPrincipal != null){
                unlink($propiedad->fotoPrincipal);
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
        $propiedades = Propiedad::all();
        return view('propiedad',compact('propiedad'));
    }
}

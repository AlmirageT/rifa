<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Database\QueryException;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Validator;
use App\PropiedadCaracteristica;
use App\TipoCaracteristica;
use App\ImagenPropiedad;
use Session;
use DB;

class PropiedadCaracteristicaController extends Controller
{
    public function index($idPropiedad)
    {
        if (!Session::has('idUsuario') && !Session::has('idTipoUsuario') && !Session::has('nombre') && !Session::has('apellido') && !Session::has('correo') && !Session::has('rut')) {
            return abort(401);
        }
        $propiedadesCaracteristicas = PropiedadCaracteristica::select('*')
            ->join('tipos_caracteristicas','propiedades_caracteristicas.idTipoCaracteristica','=','tipos_caracteristicas.idTipoCaracteristica')
            ->where('idPropiedad',$idPropiedad)
            ->get();
    	$tiposCaracteristicas = TipoCaracteristica::all();
    	return view('admin.propiedades.caracteristicas.index',compact('propiedadesCaracteristicas','idPropiedad','tiposCaracteristicas'));
    }
    public function store(Request $request)
    {
    	try {
            $validator = Validator::make($request->all(), [
                'descripcionCaracterisitca' => 'required',
                'idPropiedad' => 'required',
                'idTipoCaracteristica' => 'required'
            ]);
            if ($validator->fails()) {
                toastr()->info('Los datos no pueden estar vacios');
                return back();
            }
            DB::beginTransaction();
            $propiedadCaracteristica = new PropiedadCaracteristica($request->all());
            $propiedadCaracteristica->save();
            toastr()->success('Agregado Correctamente', 'La caracteristica se ha agregado correctamente');
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
    public function update(Request $request, $idPropiedadCaracteristica)
    {
    	try {
            $validator = Validator::make($request->all(), [
                'descripcionCaracterisitca' => 'required',
                'idPropiedad' => 'required',
                'idTipoCaracteristica' => 'required'
            ]);
            if ($validator->fails()) {
                toastr()->info('Los datos no pueden estar vacios');
                return back();
            }
            DB::beginTransaction();
            $propiedadCaracteristica = PropiedadCaracteristica::find($idPropiedadCaracteristica);
            $propiedadCaracteristica->fill($request->all());
            $propiedadCaracteristica->save();
            toastr()->success('Actualizado Correctamente', 'Las caracteristicas se han agregado correctamente');
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
    public function destroy($idPropiedadCaracteristica)
    {
    	try {
            DB::beginTransaction();
            $propiedadCaracteristica = PropiedadCaracteristica::find($idPropiedadCaracteristica);
            $propiedadCaracteristica->delete();
            toastr()->success('Eliminado Correctamente', 'La caracteristica ha sido eliminada');
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
    public function eliminarFoto($idImagenPropiedad)
    {
        try {
            DB::beginTransaction();
            $imagenPropiedad = ImagenPropiedad::find($idImagenPropiedad);
            unlink($imagenPropiedad->urlImagen);
            $imagenPropiedad->delete();
            toastr()->success('Eliminado Correctamente', 'La imagen ha sido eliminada');
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
}

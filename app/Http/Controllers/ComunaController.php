<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Database\QueryException;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Validator;
use App\Comuna;
use App\Provincia;
use App\Region;
use App\Pais;
use Session;
use DB;

class ComunaController extends Controller
{
    public function index()
    {
        if (!Session::has('idUsuario') && !Session::has('idTipoUsuario') && !Session::has('nombre') && !Session::has('apellido') && !Session::has('correo') && !Session::has('rut')) {
            return abort(401);
        }
   
		$provincias = Provincia::all();
    	$regiones = Region::all();
    	$paises = Pais::all();
    	return view('admin.ubicaciones.comunas.index',compact('provincias','regiones','paises'));
    }
    public function store(Request $request)
    {
    	try {
            $validator = Validator::make($request->all(), [
                'nombreComuna'=>'required',
                'idPais'=>'required',
                'idRegion'=>'required',
                'idProvincia'=>'required'
            ]);
            if ($validator->fails()) {
                toastr()->info('No debe dejar campos en blanco');
                return back();
            }
            DB::beginTransaction();
            	$comuna = new Comuna();
            	$comuna->nombreComuna = $request->nombreComuna;
            	$comuna->idProvincia = $request->idProvincia;
            	$comuna->save();
                toastr()->success('Agregado Correctamente', 'El tipo de calidad: '.$request->nombreComuna.' ha sido agregado correctamente', ['timeOut' => 9000]);
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
    public function edit($idComuna)
    {
        if (!Session::has('idUsuario') && !Session::has('idTipoUsuario') && !Session::has('nombre') && !Session::has('apellido') && !Session::has('correo') && !Session::has('rut')) {
            return abort(401);
        }

        $comuna = Comuna::select('*')
                ->join('provincias','comunas.idProvincia','=','provincias.idProvincia')
                ->join('regiones','provincias.idRegion','=','regiones.idRegion')
                ->join('paises','regiones.idPais','=','paises.idPais')
                ->where('comunas.idComuna',$idComuna)
                ->first();
        $provincias = Provincia::all();
        $regiones = Region::all();
        $paises = Pais::all();
        return view('admin.ubicaciones.comunas.edit',compact('provincias','regiones','paises','comuna'));
    }
    public function update(Request $request, $idComuna)
    {
    	try {
            $validator = Validator::make($request->all(), [
                'nombreComuna'=>'required',
                'idPais'=>'required',
                'idRegion'=>'required',
                'idProvincia'=>'required'
            ]);
            if ($validator->fails()) {
                toastr()->info('No debe dejar campos en blanco');
                return back();
            }
            DB::beginTransaction();
	    		$comuna = Comuna::find($idComuna);
	            $comuna->nombreComuna = $request->nombreComuna;
            	$comuna->idProvincia = $request->idProvincia;
	            $comuna->save();
                toastr()->success('Actualizado Correctamente', 'El tipo de calidad: '.$request->nombreComuna.' ha sido actualizado correctamente', ['timeOut' => 9000]);
            DB::commit();
        	return redirect::to('administrador/ubicaciones/comunas');
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
    public function destroy($idComuna)
    {
    	try {
    		DB::beginTransaction();
    			$comuna = Comuna::find($idComuna);
	            toastr()->success('Eliminado Correctamente', 'El tipo de calidad: '.$comuna->nombreComuna.' ha sido eliminado correctamente', ['timeOut' => 9000]);
	            $comuna->delete();
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

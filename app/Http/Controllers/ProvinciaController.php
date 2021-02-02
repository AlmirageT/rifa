<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Database\QueryException;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Validator;
use App\Provincia;
use App\Region;
use App\Pais;
use Session;
use DB;

class ProvinciaController extends Controller
{
    public function index()
    {  	
        if (!Session::has('idUsuario') && !Session::has('idTipoUsuario') && !Session::has('nombre') && !Session::has('apellido') && !Session::has('correo') && !Session::has('rut')) {
            return abort(401);
        }
        
    	$regiones = Region::all();
    	$paises = Pais::all();
    	return view('admin.ubicaciones.provincias.index',compact('regiones','paises'));
    }
    public function store(Request $request)
    {
    	try {
            $validator = Validator::make($request->all(), [
                'nombreProvincia' => 'required',
                'idRegion' => 'required'
            ]);
            if ($validator->fails()) {
                toastr()->info('Los datos no pueden estar vacios');
                return back();
            }
            DB::beginTransaction();
            	$provincia = new Provincia();
            	$provincia->nombreProvincia = $request->nombreProvincia;
            	$provincia->idRegion = $request->idRegion;
            	$provincia->save();
                toastr()->success('Agregado Correctamente', 'El tipo de calidad: '.$request->nombreProvincia.' ha sido agregado correctamente', ['timeOut' => 9000]);
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
    public function edit($idProvincia)
    {
        if (!Session::has('idUsuario') && !Session::has('idTipoUsuario') && !Session::has('nombre') && !Session::has('apellido') && !Session::has('correo') && !Session::has('rut')) {
            toastr()->info('Debe estar ingresado para poder entrar a esta pagina');
            return abort(401);
        }
        $provincia = Provincia::select('*')
                ->join('regiones','provincias.idRegion','=','regiones.idRegion')
                ->join('paises','regiones.idPais','=','paises.idPais')
                ->where('provincias.idProvincia',$idProvincia)
                ->first();
        $regiones = Region::all();
        $paises = Pais::all();
        return view('admin.ubicaciones.provincias.edit',compact('regiones','paises','provincia'));
    }
    public function update(Request $request, $idProvincia)
    {
    	try {
            $validator = Validator::make($request->all(), [
                'nombreProvincia' => 'required',
                'idRegion' => 'required'
            ]);
            if ($validator->fails()) {
                toastr()->info('Los datos no pueden estar vacios');
                return back();
            }
            DB::beginTransaction();
	    		$provincia = Provincia::find($idProvincia);
	            $provincia->nombreProvincia = $request->nombreProvincia;
            	$provincia->idRegion = $request->idRegion;
	            $provincia->save();
                toastr()->success('Actualizado Correctamente', 'El tipo de calidad: '.$request->nombreProvincia.' ha sido actualizado correctamente', ['timeOut' => 9000]);
            DB::commit();
        	return redirect::to('administrador/ubicaciones/provincias');
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
    public function destroy($idProvincia)
    {
    	try {
    		DB::beginTransaction();
    			$provincia = Provincia::find($idProvincia);
	            toastr()->success('Eliminado Correctamente', 'El tipo de calidad: '.$provincia->nombreProvincia.' ha sido eliminado correctamente', ['timeOut' => 9000]);
	            $provincia->delete();
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

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Database\QueryException;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Validator;
use App\TipoCaracteristica;
use Session;
use DB;

class TipoCaracteristicaController extends Controller
{
    public function index()
    {
        if (!Session::has('idUsuario') && !Session::has('idTipoUsuario') && !Session::has('nombre') && !Session::has('apellido') && !Session::has('correo') && !Session::has('rut')) {
            return abort(401);
        }
        $tiposCaracteristicas = TipoCaracteristica::all();
        return view('admin.mantenedores.tiposCaracteristicas.index',compact('tiposCaracteristicas'));
    }
    public function store(Request $request)
    {
    	try {
            $validator = Validator::make($request->all(), [
                'nombreTipoCaracteristica' => 'required',
                'itag' => 'required'
            ]);
            if ($validator->fails()) {
                toastr()->info('Los datos no pueden venir en blanco');
                return back();
            }
            DB::beginTransaction();
            $tipoCaracteristica = new TipoCaracteristica($request->all());
            $tipoCaracteristica->save();
            toastr()->success('Agregado Correctamente', 'La caracteristica ha sido agregado correctamente');
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
    public function update(Request $request, $idTipoCaracteristica)
    {
    	try {
            $validator = Validator::make($request->all(), [
                'nombreTipoCaracteristica' => 'required',
                'itag' => 'required'
            ]);
            if ($validator->fails()) {
                toastr()->info('Los datos no pueden venir en blanco');
                return back();
            }
            DB::beginTransaction();
            $tipoCaracteristica = TipoCaracteristica::find($idTipoCaracteristica);
            $tipoCaracteristica->fill($request->all());
            $tipoCaracteristica->save();
            toastr()->success('Actualizado Correctamente', 'La caracteristica ha sido actualizado correctamente');
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
    public function destroy($idTipoCaracteristica)
    {
    	try {
    		DB::beginTransaction();
            $tipoCaracteristica = TipoCaracteristica::find($idTipoCaracteristica);
            $tipoCaracteristica->delete();
            toastr()->success('Eliminado Correctamente', 'La caracteristica ha sido eliminado correctamente');
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

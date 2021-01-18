<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Database\QueryException;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Validator;
use App\Pais;
use Session;
use DB;

class PaisController extends Controller
{
    public function index()
    {
        if (!Session::has('idUsuario') && !Session::has('idTipoUsuario') && !Session::has('nombre') && !Session::has('apellido') && !Session::has('correo') && !Session::has('rut')) {
            return abort(401);
        }
    	$paises = Pais::all();
    	return view('admin.ubicaciones.paises.index',compact('paises'));
    }
    public function store(Request $request)
    {
    	try {
            $validator = Validator::make($request->all(), [
                'fotoPais' => 'max:102400',
                'nombrePais' => 'required'
            ]);
            if ($validator->fails()) {
                toastr()->info('El archivo no puede pasar de los 100MB');
                return back();
            }
            DB::beginTransaction();
            	$ruta = null;
            	if($request->file('fotoPais')){
                    $imagen = $request->file('fotoPais');
                    $imgName = uniqid().'.'.$imagen->getClientOriginalExtension();
                    $imagen->move('assets/images/paises/',$imgName);
                    $ruta = 'assets/images/paises/'.$imgName;
                }
            	$pais = new Pais($request->all());
            	$pais->fotoPais =$ruta;
            	$pais->save();
                toastr()->success('Agregado Correctamente', 'El tipo de calidad: '.$request->nombrePais.' ha sido agregado correctamente', ['timeOut' => 9000]);
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
    public function update(Request $request, $idPais)
    {
    	try {
            $validator = Validator::make($request->all(), [
                'fotoPais' => 'max:102400',
                'nombrePais' => 'required'
            ]);
            if ($validator->fails()) {
                toastr()->info('El archivo no puede pasar de los 100MB');
                return back();
            }
            DB::beginTransaction();
	    		$pais = Pais::find($idPais);
	            $pais->nombrePais = $request->nombrePais;
	            if ($request->file('fotoPais')) {
	            	if ($pais->fotoPais) {
                        unlink($pais->fotoPais);
                        $imagen = $request->file('fotoPais');
                        $imgName = uniqid().'.'.$imagen->getClientOriginalExtension();
                        $imagen->move('assets/images/paises/',$imgName);
                        $ruta = 'assets/images/paises/'.$imgName;
		            	$pais->fotoPais = $ruta;
	            	}
	            }
	            $pais->save();
                toastr()->success('Actualizado Correctamente', 'El tipo de calidad: '.$request->nombrePais.' ha sido actualizado correctamente', ['timeOut' => 9000]);
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
    public function destroy($idPais)
    {
    	try {
    		DB::beginTransaction();
    			$pais = Pais::find($idPais);
    			if ($pais->fotoPais) {
                	unlink($pais->fotoPais);
    			}
	            toastr()->success('Eliminado Correctamente', 'El tipo de calidad: '.$pais->nombrePais.' ha sido eliminado correctamente', ['timeOut' => 9000]);
	            $pais->delete();
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

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Database\QueryException;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Validator;
use App\Propiedad;
use App\TipoPremio;
use App\Premio;
use Session;
use Image;
use DB;

class PremiosController extends Controller
{
    public function index($idPropiedad)
    {
        if (!Session::has('idUsuario') && !Session::has('idTipoUsuario') && !Session::has('nombre') && !Session::has('apellido') && !Session::has('correo') && !Session::has('rut')) {
            return abort(401);
        }
        $premios = Premio::select('*')
            ->join('tipos_premios','premios.idTipoPremio','=','tipos_premios.idTipoPremio')
            ->where('idPropiedad',$idPropiedad)
            ->get();
        $tiposPremios = TipoPremio::all();
        return view('admin.propiedades.premios.index',compact('premios','idPropiedad','tiposPremios'));
    }
    public function store(Request $request)
    {
    	try {
            $validator = Validator::make($request->all(), [
                'descripcion' => 'required',
                'idTipoPremio' => 'required'
            ]);
            if ($validator->fails()) {
                toastr()->info('Los datos no pueden estar vacios');
                return back();
            }
            DB::beginTransaction();
            $premio = new Premio($request->all());
            if($request->file('imagenPremio')){
                $imagen = $request->file('imagenPremio');
                $imgName = uniqid().'.'.$imagen->getClientOriginalExtension();
                $imagen->move('assets/images/propiedades/',$imgName);
                $premio->imagenPremio = 'assets/images/propiedades/'.$imgName;
            }
            $premio->save();
            toastr()->success('Agregado Correctamente', 'El premio ha sido agregado correctamente');
            DB::commit();
            return redirect::to('administrador/propiedades/premios/'.$request->idPropiedad);
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
    public function update(Request $request, $idPremio)
    {
    	try {
            $validator = Validator::make($request->all(), [
                'descripcion' => 'required',
                'idTipoPremio' => 'required'
            ]);
            if ($validator->fails()) {
                toastr()->info('Los datos no pueden estar vacios');
                return back();
            }
            DB::beginTransaction();
            $premio = Premio::find($idPremio);
            if($premio->imagenPremio != null ){
                if($request->file('imagenPremio')){
                    unlink($premio->imagenPremio);
                }
            }
            $premio->fill($request->all());
            if($request->file('imagenPremio')){
                $imagen = $request->file('imagenPremio');
                $imgName = uniqid().'.'.$imagen->getClientOriginalExtension();
                $imagen->move('assets/images/propiedades/',$imgName);
                $premio->imagenPremio = 'assets/images/propiedades/'.$imgName;
            }
            $premio->save();
            toastr()->success('Actualizado Correctamente', 'El premio se ha actualizado correctamente', ['timeOut' => 9000]);
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
    public function destroy($idPremio)
    {
    	try {
            DB::beginTransaction();
            $premio = Premio::find($idPremio);
            if($premio->imagenPremio != null ){
                unlink($premio->imagenPremio);
            }
            toastr()->success('Eliminado Correctamente', 'El premio ha sido eliminado correctamente', ['timeOut' => 9000]);
            $premio->delete();
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

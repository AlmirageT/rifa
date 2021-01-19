<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Database\QueryException;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Validator;
use App\Usuario;
use App\TipoUsuario;
use Session;
use DB;

class UsuarioController extends Controller
{
    public function index()
    {
        if (!Session::has('idUsuario') && !Session::has('idTipoUsuario') && !Session::has('nombre') && !Session::has('apellido') && !Session::has('correo') && !Session::has('rut')) {
            return abort(401);
        }

        return view('admin.usuarios.index');
    }
    public function create()
    {
        if (!Session::has('idUsuario') && !Session::has('idTipoUsuario') && !Session::has('nombre') && !Session::has('apellido') && !Session::has('correo') && !Session::has('rut')) {
            return abort(401);
        }
        $tiposUsuarios = TipoUsuario::all();
    	return view('admin.usuarios.create',compact('tiposUsuarios'));
    }
    public function store(Request $request)
    {
    	try {
            $validator = Validator::make($request->all(), [
                'nombreUsuario' => 'required',
                'correoUsuario' => 'required',
                'telefonoUsuario' => 'required',
                'rutUsuario' => 'required',
                'idTipoUsuario' => 'required'
            ]);
            if ($validator->fails()) {
                toastr()->info('Los datos no pueden venir en blanco');
                return back();
            }
            DB::beginTransaction();
            $usuario = new Usuario();
            $usuario->nombreUsuario = $request->nombreUsuario;
            $usuario->correoUsuario = $request->correoUsuario;
            $usuario->telefonoUsuario = $request->telefonoUsuario;
            $usuario->rutUsuario = $request->rutUsuario;
            if($request->idTipoUsuario == "usuario"){
                $usuario->idTipoUsuario = null;
            }else{
                $usuario->idTipoUsuario = $request->idTipoUsuario;
            }
            if($request->password){
                $usuario->password = $request->password;
            }
            $usuario->save();
            toastr()->success('Agregado Correctamente', 'El usuario ha sido agregado correctamente');
            DB::commit();
            return redirect::to('administrador/usuarios');
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
    public function edit($idUsuario)
    {
        if (!Session::has('idUsuario') && !Session::has('idTipoUsuario') && !Session::has('nombre') && !Session::has('apellido') && !Session::has('correo') && !Session::has('rut')) {
            return abort(401);
        }
        $usuario = Usuario::find($idUsuario);
        $tiposUsuarios = TipoUsuario::all();

    	return view('admin.usuarios.edit',compact('tiposUsuarios','usuario'));
    }
    public function update(Request $request, $idUsuario)
    {
    	try {
            $validator = Validator::make($request->all(), [
                'nombreUsuario' => 'required',
                'correoUsuario' => 'required',
                'telefonoUsuario' => 'required',
                'rutUsuario' => 'required',
                'idTipoUsuario' => 'required'
            ]);
            if ($validator->fails()) {
                toastr()->info('Los datos no pueden venir en blanco');
                return back();
            }
            DB::beginTransaction();
            $usuario = Usuario::find($idUsuario);
            $usuario->nombreUsuario = $request->nombreUsuario;
            $usuario->correoUsuario = $request->correoUsuario;
            $usuario->telefonoUsuario = $request->telefonoUsuario;
            $usuario->rutUsuario = $request->rutUsuario;
            if($request->idTipoUsuario == "usuario"){
                $usuario->idTipoUsuario = null;
            }else{
                $usuario->idTipoUsuario = $request->idTipoUsuario;
            }
            if($request->password){
                $usuario->password = $request->password;
            }
            $usuario->save();
            toastr()->success('Actualizado Correctamente', 'El usuario ha sido actualizado correctamente');
            DB::commit();
            return redirect::to('administrador/usuarios');
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
    public function destroy($idUsuario)
    {
    	try {
    		DB::beginTransaction();
            $usuario = Usuario::find($idUsuario);
            $usuario->delete();
            toastr()->success('Eliminado Correctamente', 'El usuario ha sido eliminado correctamente');
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

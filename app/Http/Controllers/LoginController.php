<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Database\QueryException;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Validator;
use App\Usuario;
use Session;

class LoginController extends Controller
{
    public function index()
    {
    	if (Session::has('correoUsuario')) {
            return back();
        }
    	return view('auth.login');
    }
    public function ingresoPortal(Request $request)
    {
    	$validator = Validator::make($request->all(), [
            'correoUsuario'=> 'required|email',
            'password'=> 'required'
        ]);
        if ($validator->fails()) {
            toastr()->info('Todos los datos deben estar llenos');
            return back();
        }
        try {
        	$buscarUsuario = Usuario::where('correoUsuario',$request->correoUsuario)
        	->where('password',$request->password)
        	->where('idTipoUsuario',1)
        	->firstOrFail();
        	Session::put('idUsuario', $buscarUsuario->idUsuario);
            Session::put('idTipoUsuario', $buscarUsuario->idTipoUsuario);
            Session::put('nombreUsuario', $buscarUsuario->nombreUsuario);
            Session::put('correoUsuario', $buscarUsuario->correoUsuario);
            Session::put('rutUsuario', $buscarUsuario->rutUsuario);
    		toastr()->success('Ingreso Exitoso','Bienvenido: '.$buscarUsuario->nombreUsuario, ['timeOut' => 5000]);
            return redirect::to('administrador');
            
        } catch (QueryException $e) {
            toastr()->warning('Se ha producido un error interno. Favor intente nuevamente');
            return back();
        } catch (ModelNotFoundException $e) {
            toastr()->warning('Usuario y/o contraseña incorrecto');
            return back();
        } catch (Exception $e) {
            toastr()->warning('Se ha producido un error. Favor intente nuevamente');
            return back();
        }

    }
    public function logout(Request $request) {

    	if (!Session::has('rutUsuario') || !Session::has('correoUsuario') || !Session::has('nombreUsuario') || !Session::has('idTipoUsuario') || !Session::has('idUsuario')) {
    	    return abort(401);
        }
		Session::forget('idUsuario');
        Session::forget('idTipoUsuario');
        Session::forget('nombreUsuario');
        Session::forget('correoUsuario');
        Session::forget('rutUsuario');
        toastr()->info('Salida del sistema exitosa');
        return redirect::to('login');
    }
}

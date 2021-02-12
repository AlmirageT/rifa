<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Database\QueryException;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Validator;
use App\Mail\Consulta;
use Mail;
use DB;

class CorreoConsultaController extends Controller
{
    public function enviarCorreo(Request $request)
    {
    	try{
	    	$validator = Validator::make($request->all(), [
                'nombre'=> 'required',
                'correo'=> 'required|email',
                'fono'=> 'required',
                'consulta'=> 'required'
            ]);
            if ($validator->fails()) {
                toastr()->info('Todos los datos deben estar llenos');
                return back();
            }
            $nombre = $request->nombre;
            $correo = $request->correo;
            $fono = $request->fono;
            $consulta = $request->consulta;
	    	Mail::to('contacto@rifopoly.com')->bcc(['pauloberrios@gmail.com','lina.di@isbast.com'])->send(new Consulta($nombre, $correo, $fono, $consulta));
            toastr()->info('Consulta enviado exitosamente');
	    	return back();
    	} catch (ModelNotFoundException $e) {
            toastr()->warning('No autorizado');
            return back();
        } catch (QueryException $e) {
            toastr()->warning('Ha ocurrido un error, favor intente nuevamente' . $e->getMessage());
            return back();
        } catch (DecryptException $e) {
            toastr()->info('Ocurrio un error al intentar acceder al recurso solicitado');
            return back();
        } catch (Exception $e) {
            toastr()->error('Ha surgido un error inesperado', $e->getMessage(), ['timeOut' => 9000]);
            return redirect::back();
        }
    }
}

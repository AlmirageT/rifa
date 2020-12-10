<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;

class AdminController extends Controller
{
    public function index()
    {
    	if (!Session::has('correoUsuario') || !Session::has('rutUsuario') || !Session::has('idTipoUsuario') || !Session::has('idUsuario') || !Session::has('nombreUsuario')) {
            return abort(401);
        }
        return view('admin.home');
    }
}

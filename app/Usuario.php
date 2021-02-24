<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    protected $table = 'usuarios';
    protected $primaryKey = 'idUsuario';
    protected $fillable = [
    	'nombreUsuario',
    	'correoUsuario',
    	'telefonoUsuario',
    	'rutUsuario',
    	'password',
		'codigoPais',
    	'idTipoUsuario'
    ];
}

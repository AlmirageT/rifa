<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Propiedad extends Model
{
    protected $table = 'propiedades';
    protected $primaryKey = 'idPropiedad';
    protected $fillable = [
    	'nombrePropiedad',
    	'fotoPrincipal',
    	'caracteristicasPropiedad',
    	'fotoMapa',
    	'descripcionPropiedad',
    	'mConstruidos',
    	'mSuperficie',
    	'mTerraza',
    	'urlVideo',
    	'urlMattlePort',
    	'direccionPropiedad',
    	'numeracionPropiedad',
    	'idPais',
    	'idRegion',
    	'idProvincia',
    	'idComuna'
    ];
}

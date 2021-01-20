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
    	'fotoMapa',
    	'descripcionPropiedad',
    	'mConstruidos',
    	'mSuperficie',
    	'mTerraza',
    	'urlVideo',
    	'urlMattlePort',
		'direccionPropiedad',
		'numeracionPropiedad',
    	'codigoPostal',
    	'latitud',
    	'longitud',
		'poi',
		'urlFacebook',
		'urlInstagram',
		'valorRifa',
		'descripcionDetalle',
		'subtituloPropiedad',
		'pdfBasesLegales',
    	'idPais',
    	'idRegion',
    	'idProvincia',
		'idComuna',
		'idEstado'
    ];
}

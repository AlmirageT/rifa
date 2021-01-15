<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::view('/', 'welcome');
Route::view('galeria', 'galeria');
Route::view('bases-legales', 'bases');
Route::view('propiedades', 'propiedad');
Route::get('rifa', 'ComprarRifaController@index');
Route::post('comprar-numeros','ComprarRifaController@envioEmail');
//Route::get('pruebaCambioNumeros','ComprarRifaController@numeros');
//Route::get('numeros-cienmil','ComprarRifaController@hastaCien');
//tabla de boletas creadas para revisión de compra
Route::post('enviar-consulta','CorreoConsultaController@enviarCorreo');
Route::group(['prefix'=>'administrador'], function(){
	Route::get('/','AdminController@index');

	Route::group(['prefix'=>'transacciones'], function(){
		Route::group(['prefix'=>'boletas'], function(){
			Route::get('/','ListadoBoletaController@index');
			Route::get('detalle-boleta/{idBoleta}','ListadoBoletaController@detalle');
			Route::get('enviar-boleta/{idBoleta}','ListadoBoletaController@enviarBoleta');
			Route::get('liberar-boleta/{idBoleta}','ListadoBoletaController@liberarBoleta');
			Route::get('validadas','BoletasValidadasController@index');
			Route::get('validadas/detalle-boleta/{idBoleta}','ListadoBoletaController@detalle');
			Route::get('compradas','BoletasCompradasController@index');
			Route::get('compradas/detalle-boleta/{idBoleta}','ListadoBoletaController@detalle');
			Route::get('compradas/enviar-boleta/{idBoleta}','ListadoBoletaController@enviarBoleta');
			Route::get('compradas/liberar-boleta/{idBoleta}','ListadoBoletaController@liberarBoleta');

		});
	});

	Route::group(['prefix'=>'propiedades'], function(){
		Route::get('/','PropiedadController@index');
	});

	Route::group(['prefix'=>'ubicaciones'],function(){
		Route::get('paises','PaisController@index');
		Route::get('regiones','RegionController@index');
		Route::get('provincias','ProvinciaController@index');
		Route::get('comunas','ComunaController@index');
	});

	Route::group(['prefix'=>'mantenedores'], function(){
		Route::get('estados','PropiedadController@index');
		Route::get('tipo-estados','TipoEstadoController@index');
		Route::get('tipo-premios','TipoPremioController@index');
	});

	Route::group(['prefix'=>'parametros-generales'], function(){
		Route::get('/','ParametroGeneralController@index');
	});
});
Route::get('comprobar/boleta/{idBoleta}','ValidarBoletaController@validacionBoleta');
//script para crear los 100.000 numeros
//Route::get('generar-numeros','ComprarRifaController@numeros');
Route::post('datatable-boletas','ListadoBoletaController@listaBoletas');
Route::post('datatable-boletas-validadas','BoletasValidadasController@listaBoletas');
Route::post('datatable-boletas-compradas','BoletasCompradasController@listaBoletas');

//rutas login
Route::get('login','LoginController@index');
Route::post('ingreso-mi-portal','LoginController@ingresoPortal');
Route::post('logout','LoginController@logout');

//RUTA PARA CRUD REGIONES
Route::resource('mantenedor-regiones','RegionController');
Route::delete('mantenedor-regiones/{idRegion}',array(
    'uses'=>'RegionController@destroy',
    'as'=>'mantenedor-regiones.delete'
));
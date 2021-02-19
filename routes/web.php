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
Route::get('/', 'WelcomeController@index');
//Route::view('carrito-compra', 'galeria');
//Route::view('bases-legales', 'bases');
Route::get('tienda-rifo-propiedades', 'PropiedadController@tienda');
Route::get('rifo-propiedades/detalle', 'ComprarRifaController@index');
Route::post('comprar-numeros','ComprarRifaController@envioEmail');
Route::post('tienda-rifo-propiedades','PropiedadController@propiedadTienda');
Route::post('compra-ticket-directo/{idPropiedad}','PropiedadController@ingresoAFormularioUsuario');
Route::post('compra-ticket-directo-detalle/{idPropiedad}','PropiedadController@ingresoAFormularioUsuarioDetalle');
Route::get('revisar-estado-boleta','ComprarRifaController@estadoBoleta');
Route::view('felicidades-por-su-compra','compraExitosa');
Route::get('formas-de-pago','PropiedadController@enviarPropiedad');

//Route::get('contarJobs','WelcomeController@contarJobs');
/*
Route::get('/clear-cache', function() {
    Artisan::call('cache:clear');
    return "Cache is cleared";
});*/
Route::get('tickets/{tokencorto}','WelcomeController@descargarPdf');
Route::get('prueba-pdf-envio-mail','WelcomeController@pdf');
//Route::get('prueba-funcion-kernel','ComprarRifaController@reversarEstadoDeNoPagados');

Route::view('bases-legales','basesLegales');

Route::get('carrito-de-compra-agregar-ticket/{cantidad}/{idPropiedad}','PropiedadController@crearCarritoCompra');
//Route::get('carrito-de-compra-agregar-ticket-detalle/{idPropiedad}','PropiedadController@crearCarritoCompraInmediata');
Route::get('eliminar-ticket-carrito/{idPropiedad}','PropiedadController@eliminarDatoCarroCompra');
Route::get('obetener-valor-tickets/{idPropiedad}/{cantidad}','PropiedadController@cambiarValorDatos');
Route::get('restar-valor-tickets/{idPropiedad}/{cantidad}','PropiedadController@restarValorDatos');
Route::view('nosotros','conocenos');

Route::get('paso-final-compra-ticket','UsuarioController@formularioUsuario');

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
			Route::get('validadas/reenviar-boleta/{idBoleta}/{idUsuario}','BoletasValidadasController@reeviar');
			Route::get('compradas','BoletasCompradasController@index');
			Route::get('compradas/detalle-boleta/{idBoleta}','ListadoBoletaController@detalle');
			Route::get('compradas/enviar-boleta/{idBoleta}','ListadoBoletaController@enviarBoleta');
			Route::get('compradas/liberar-boleta/{idBoleta}','ListadoBoletaController@liberarBoleta');
			Route::get('exportar/excel/compradas','ListadoBoletaController@exportarCompradas');
			Route::get('exportar/excel/validadas','BoletasValidadasController@exportarValidadas');
			Route::get('crear-boleta-por-deposito','ListadoBoletaController@crearBoleta');

		});
	});

	Route::group(['prefix'=>'propiedades'], function(){
		Route::get('/','PropiedadController@index');
		Route::get('create','PropiedadController@create');
		Route::get('editar/{idPropiedad}','PropiedadController@edit');
		Route::get('destroy/{idPropiedad}','PropiedadController@destroy');
		Route::get('imagenes/{idPropiedad}','PropiedadController@imagenes');
		Route::post('img-propiedad/{idPropiedad}','PropiedadController@dropzone');
		Route::get('premios/{idPropiedad}','PremiosController@index');
		Route::get('caracteristicas/{idPropiedad}','PropiedadCaracteristicaController@index');
		Route::get('eliminar-imagen/{idImagenPropiedad}','PropiedadCaracteristicaController@eliminarFoto');
	});

	Route::group(['prefix'=>'ubicaciones'],function(){
		Route::get('paises','PaisController@index');
		Route::get('regiones','RegionController@index');
		Route::get('provincias','ProvinciaController@index');
		Route::get('comunas','ComunaController@index');
	});

	Route::group(['prefix'=>'mantenedores'], function(){
		Route::get('estados','EstadoController@index');
		Route::get('tipo-estados','TipoEstadoController@index');
		Route::get('tipo-premios','TipoPremioController@index');
		Route::get('tipo-caracteristica','TipoCaracteristicaController@index');
	});

	Route::group(['prefix'=>'parametros-generales'], function(){
		Route::get('/','ParametroGeneralController@index');
	});

	Route::group(['prefix'=>'usuarios'], function(){
		Route::get('/','UsuarioController@index');
		Route::get('create','UsuarioController@create');
		Route::get('edit/{idUsuario}','UsuarioController@edit');
		Route::get('destroy/{idUsuario}','UsuarioController@destroy');
	});
});

Route::get('curls/{request}','BusquedaController@curls');



//datatables
Route::post('datatable-provincias','BusquedaController@tablaProvincias');
Route::post('datatable-comunas','BusquedaController@tablaComunas');
Route::post('datatable-propiedades','BusquedaController@tablaPropiedades');
Route::post('datatable-usuarios','BusquedaController@tablaUsuarios');


//busqueda
Route::get('regiones/{idPais}','BusquedaController@obtenerRegiones');
Route::get('provincias/{idRegion}','BusquedaController@obtenerProvincias');
Route::get('comunas/{idProvincia}','BusquedaController@obtenerComuna');


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
//crud paises
Route::resource('mantenedor-paises','PaisController');
Route::delete('mantenedor-paises/{idPais}',array(
    'uses'=>'PaisController@destroy',
    'as'=>'mantenedor-paises.delete'
));

//crud provincias
Route::resource('mantenedor-provincias','ProvinciaController');
Route::get('administrador/ubicaciones/provincias/edit-provincia/{idProvincia}','ProvinciaController@edit');
Route::get('administrador/ubicaciones/provincias/destroy-provincia/{idProvincia}','ProvinciaController@destroy');
//crud comunas
Route::resource('mantenedor-comunas','ComunaController');
Route::get('administrador/ubicaciones/comunas/edit-comuna/{idComuna}','ComunaController@edit');
Route::get('administrador/ubicaciones/comunas/destroy-comuna/{idComuna}','ComunaController@destroy');
//crud parametros generales
Route::resource('mantenedor-parametros-generales','ParametroGeneralController');
Route::delete('mantenedor-parametros-generales/{idParametroGeneral}',array(
    'uses'=>'ParametroGeneralController@destroy',
    'as'=>'mantenedor-parametros-generales.delete'
));
//crud tipos estados
Route::resource('mantenedor-tipos_estados','TipoEstadoController');
Route::delete('mantenedor-tipos_estados/{idTipoEstado}',array(
    'uses'=>'TipoEstadoController@destroy',
    'as'=>'mantenedor-tipos_estados.delete'
));
//crud tipos premios
Route::resource('mantenedor-tipos-premios','TipoPremioController');
Route::delete('mantenedor-tipos-premios/{idTipoPremio}',array(
    'uses'=>'TipoPremioController@destroy',
    'as'=>'mantenedor-tipos-premios.delete'
));
//crud estados
Route::resource('mantenedor-estados','EstadoController');
Route::delete('mantenedor-estados/{idEstado}',array(
    'uses'=>'EstadoController@destroy',
    'as'=>'mantenedor-estados.delete'
));
//crud propiedades
Route::resource('mantenedor-propiedades','PropiedadController');
Route::delete('mantenedor-propiedades/{idPropiedad}',array(
    'uses'=>'PropiedadController@destroy',
    'as'=>'mantenedor-propiedades.delete'
));
//crud usuarios
Route::resource('mantenedor-usuarios','UsuarioController');
//crud tipo caracteristicas
Route::resource('mantenedor-tipos-caracteristicas','TipoCaracteristicaController');
Route::delete('mantenedor-tipos-caracteristicas/{idTipoCaracteristica}',array(
    'uses'=>'TipoCaracteristicaController@destroy',
    'as'=>'mantenedor-tipos-caracteristicas.delete'
));
//crud premios
Route::resource('mantenedor-premios','PremiosController');
Route::delete('mantenedor-premios/{idPremio}',array(
    'uses'=>'PremiosController@destroy',
    'as'=>'mantenedor-premios.delete'
));
//crud caracteristicas
Route::resource('mantenedor-caracteristicas','PropiedadCaracteristicaController');
Route::delete('mantenedor-caracteristicas/{idPropiedadCaracteristica}',array(
    'uses'=>'PropiedadCaracteristicaController@destroy',
    'as'=>'mantenedor-caracteristicas.delete'
));
//crear boleta
Route::resource('mantenedor-boletas','ListadoBoletaController');
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
//tabla de boletas creadas para revisión de compra
Route::get('tabla-boletas','ListadoBoletaController@index');
Route::post('datatable-boletas','ListadoBoletaController@listaBoletas');
Route::post('enviar-consulta','CorreoConsultaController@enviarCorreo');
Route::get('detalle-boleta/{idBoleta}','ListadoBoletaController@detalle');
Route::get('enviar-boleta/{idBoleta}','ListadoBoletaController@enviarBoleta');
//script para crear los 100.000 numeros
//Route::get('generar-numeros','ComprarRifaController@numeros');
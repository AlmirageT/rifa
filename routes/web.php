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
Route::get('tabla-boletas','ListadoBoletaController@index');
Route::post('datatable-boletas','ListadoBoletaController@listaBoletas');
Route::post('enviar-consulta','CorreoConsultaController@enviarCorreo');
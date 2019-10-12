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


Route::get('/', 'DocumentoController@inicio')->name('inicio');
Route::post('/','DocumentoController@guardarDocumento');

Route::get('documento/descargar/{titulo}','DocumentoController@descargarDocumento');
Route::get('documento/eliminar/{titulo}','DocumentoController@borrarDocumento');
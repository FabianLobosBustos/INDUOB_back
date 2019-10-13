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


//Documents
Route::get('/', 'DocumentController@inicio')->name('inicio');
Route::post('/','DocumentController@guardarDocumento');

Route::get('documents/download/{titulo}','DocumentController@descargarDocumento');
Route::get('documents/erase/{titulo}','DocumentController@borrarDocumento');

//Modules
Route::apiResource('modules', 'ModuleController');

//Question
Route::get('questionByModule/{module_id}', 'QuestionController@index_by_module');

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

Route::get('documents/download/{document_id}','DocumentController@descargarDocumento');
Route::get('documents/erase/{document_id}','DocumentController@borrarDocumento');
Route::get('documents','DocumentController@index');

//Modules
Route::apiResource('modules', 'ModuleController');

//Question
Route::get('questionByModule/{module_id}', 'QuestionController@index_by_module');

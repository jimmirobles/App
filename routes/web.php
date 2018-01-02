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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::resource('/', 'FrontController');
Route::resource('asesores', 'AsesoresController');
Route::resource('empresas', 'EmpresasController');
Route::resource('servicios', 'ServiciosController');
Route::resource('documentos', 'FrontController');

Route::get('servicios/{id}/destroy', [
	'uses' 	=> 'ServiciosController@destroy',
	'as' 	=> 'servicios.destroy',
]);

Route::get('asesores/{id}/destroy', [
	'uses' 	=> 'AsesoresController@destroy',
	'as' 	=> 'asesores.destroy',
]);

Route::get('empresas/{id}/destroy', [
	'uses' 	=> 'EmpresasController@destroy',
	'as' 	=> 'empresas.destroy',
]);
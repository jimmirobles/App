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

Route::resource('dashboard', 'FrontController');
Route::resource('clientes', 'ClientesController');
Route::resource('servicios', 'ServiciosController');
Route::resource('documentos', 'FrontController');
Route::resource('usuarios', 'UsersController');

Route::get('/', 'Auth\LoginController@showLoginForm');
Route::post('login', 'Auth\LoginController@login')->name('login');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');

Route::get('servicios/{id}/destroy', [
	'uses' 	=> 'ServiciosController@destroy',
	'as' 	=> 'servicios.destroy',
]);

Route::get('clientes/{id}/destroy', [
	'uses' 	=> 'ClientesController@destroy',
	'as' 	=> 'clientes.destroy',
]);

Route::get('usuarios/{id}/destroy', [
	'uses' 	=> 'UsersController@destroy',
	'as' 	=> 'usuarios.destroy',
]);

// Vistas de prueba
Route::get('downloadPDF/{id}', 'FrontController@downloadPDF');
Route::get('sendEmail', 'FrontController@sendEmail');



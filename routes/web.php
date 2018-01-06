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
Route::resource('empresas', 'EmpresasController');
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

Route::get('empresas/{id}/destroy', [
	'uses' 	=> 'EmpresasController@destroy',
	'as' 	=> 'empresas.destroy',
]);

Route::get('usuarios/{id}/destroy', [
	'uses' 	=> 'UsersController@destroy',
	'as' 	=> 'usuarios.destroy',
]);



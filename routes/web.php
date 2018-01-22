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
Route::get('send/{id}', 'FrontController@sendEmail')->name('send');

Route::get('pdf/{id}', 'PDFController@show')->name('showPDF');
Route::get('clear', 'PDFController@delete_all')->name('clear-all');

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

Route::get('/mailable', function () {
    $documento = CRM\Documento::find(1);
    $folio = $documento['folio'];

    return new CRM\Mail\DocumentCreated($folio);
});


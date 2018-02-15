<?php
use CRM\Documento;
use CRM\Contacto;
use Illuminate\Support\Facades\Input;

Route::resources([
	'dashboard' => 'FrontController',
	'clientes' => 'ClientesController',
	'servicios' => 'ServiciosController',
	'documentos' => 'FrontController',
	'usuarios' => 'UsersController',
	'contactos' => 'ContactosController',
	'comentarios' => 'ComentariosController'
]);

Route::prefix('reportes')->group(function(){
	Route::get('reporte1', 'ReportesController@reporte1')->name('reporte1');
	Route::get('reporte1-pdf', 'ReportesController@reporte1_view')->name('reporte1-pdf');
});

Route::prefix('api')->group(function(){
	Route::get('documentos', 'FrontController@dataTables');
	Route::get('clientes', 'ClientesController@dataTables');
	Route::get('contactos', 'ContactosController@dataTables');
});

Route::get('/', 'Auth\LoginController@showLoginForm');
Route::get('pdf/{id}', 'PDFController@show')->name('showPDF');
Route::get('clear', 'PDFController@delete_all')->name('clear-all');

Route::post('login', 'Auth\LoginController@login')->name('login');
Route::post('send', 'FrontController@sendEmail')->name('send');
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

Route::get('documentos/{id}/destroy', [
	'uses' 	=> 'FrontController@destroy',
	'as' 	=> 'documentos.destroy',
]);

Route::get('documentos/create/ajax-contacto',function(){
	$cliente_id = Input::get('cliente');
	$contactos = Contacto::where('id_cliente','=',$cliente_id)->get();
	return $contactos;
 
});

Route::get('reportes/obtener-datos', function() {
	$id_cliente = Input::get('id_cliente');
	$mes = Input::get('mes');
	$documentos = Documento::where('id_cliente', '=', $id_cliente)
				->whereMonth('fecha', $mes)
				->get();
	return $documentos;
});
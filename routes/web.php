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
	'comentarios' => 'ComentariosController',
	'hosts' => 'HostsController'
]);

Route::prefix('reportes')->group(function(){
	Route::get('reporte1', 'ReportesController@reporte1')->name('reporte1');
	Route::get('reporte1-pdf', 'ReportesController@reporte1_view')->name('reporte1-pdf');
});

Route::prefix('api')->group(function(){
	Route::get('documentos', 'FrontController@dataTables')->name('api.documentos');
	Route::get('clientes', 'ClientesController@dataTables')->name('api.clientes');
	Route::get('contactos', 'ContactosController@dataTables')->name('api.contactos');
});

Route::get('excel/{tipo}/exportar', 'ExcelController@exportar_excel')->name('excel.exportar');
Route::get('csv/{tipo}/exportar', 'ExcelController@exportar_csv')->name('csv.exportar');

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

Route::get('contactos/{id}/destroy', [
	'uses' 	=> 'ContactosController@destroy',
	'as' 	=> 'contactos.destroy',
]);

Route::get('hosts/{id}/destroy', [
	'uses' 	=> 'HostsController@destroy',
	'as' 	=> 'hosts.destroy',
]);

Route::get('documentos/create/ajax-contacto',function(){
	$cliente_id = Input::get('cliente');
	$contactos = Contacto::where('id_cliente','=',$cliente_id)->orderBy('nombre')->get();
	return $contactos;
 
});

Route::get('reportes/obtener-datos', function() {
	$id_cliente = Input::get('id_cliente');
	$fecha1 = Input::get('fecha1');
	$fecha2 = Input::get('fecha2');
	$documentos = Documento::where('id_cliente', '=', $id_cliente)
				->whereBetween('fecha', [$fecha1, $fecha2])
				->get();
	return $documentos;
});
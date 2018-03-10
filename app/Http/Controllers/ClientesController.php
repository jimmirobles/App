<?php

namespace CRM\Http\Controllers;

use CRM\Http\Requests\ClienteRequest;
use Illuminate\Support\Facades\DB;
use Yajra\Datatables\Datatables;
use Illuminate\Http\Request;
use CRM\Documento;
use CRM\Contacto;
use CRM\Cliente;

class ClientesController extends Controller
{
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index()
	{
		// $clientes = DB::table('clientes')->orderBy('rfc')->paginate(9);
		return view('pages.clientes.index');
	}

	public function dataTables()
	{
		$clientes = Cliente::select(['id', 'razon_social', 'rfc']);

		return datatables()->of($clientes)
			->addColumn('action', function ($cliente) {
				return '<div class="btn-group" role="group"><a role="button" href="' . route('clientes.edit', $cliente->id) . '" class="btn btn-info btn-sm"><i class="fa fa-pencil"></i> Editar</a><a role="button" href="' . route('clientes.destroy', $cliente->id) . '" class="btn btn-danger btn-sm" onclick="return confirm(\'¿Deseas eliminarlo?\')"><i class="fa fa-trash"></i></a></div>';
			})
			->toJson();
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create()
	{
		return view('pages.clientes.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(ClienteRequest $request)
	{
		$cliente = new Cliente($request->all());
		$cliente->save();

		flash('Cliente: <strong>'. $cliente->razon_social .'</strong>, agregado correctamente.')
			->success()
			->important();
		return redirect()->action('ClientesController@index');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function edit($id)
	{
		$cliente = Cliente::find($id);
		return view('pages.clientes.edit', compact('cliente'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request, $id)
	{
		$cliente = Cliente::find($id);
		$cliente->fill($request->all());
		$cliente->save();

		flash('Se ha actualizado: <strong>'. $cliente->razon_social .'</strong>, correctamente.')
			->success()
			->important();
		return redirect()->action('ClientesController@index');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function destroy($id)
	{
		if (Documento::where('id_cliente', '=', $id)->exists()) {
			flash('No se permite eliminar, ya existen documentos de este cliente.')
				->error()
				->important();
		}
		elseif (Contacto::where('id_cliente', '=', $id)->exists()) {
			flash('No se permite eliminar, ya existen contactos asociados a este cliente.')
				->error()
				->important();
		}
		else {
			$cliente = Cliente::find($id);
			$cliente->delete();
			flash('Se ha borrado: <strong>'. $cliente->razon_social .'</strong>, exitosamente!')
				->success()
				->important();
		}
		return redirect()->action('ClientesController@index');
	}
}

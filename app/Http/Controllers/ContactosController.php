<?php

namespace CRM\Http\Controllers;

use Illuminate\Support\Facades\DB;
use CRM\Http\Requests\ContactoRequest;
use Illuminate\Http\Request;
use CRM\Contacto;
use CRM\Cliente;

class ContactosController extends Controller
{
	public function index()
	{
		return view('pages.contactos.index');
	}

	public function dataTables()
	{
		$contactos = DB::table('contactos')
			->join('clientes', 'contactos.id_cliente', '=', 'clientes.id')
			->select([
				'contactos.id', 
				'contactos.nombre', 
				'contactos.email', 
				'clientes.razon_social'
			]);

		return datatables()->of($contactos)
			->addColumn('action', function ($contacto) {
				return '<div class="btn-group" role="group"><a role="button" href="' . route('contactos.edit', $contacto->id) . '" class="btn btn-info btn-sm"><i class="fa fa-pencil"></i> Editar</a><a role="button" href="' . route('contactos.destroy', $contacto->id) . '" class="btn btn-danger btn-sm" onclick="return confirm(\'¿Deseas eliminarlo?\')"><i class="fa fa-trash"></i></a></div>';
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
		$clientes = Cliente::all()->sortBy('razon_social')->pluck('razon_social', 'id');
		return view('pages.contactos.create')
				->with('clientes', $clientes);
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request)
	{
		$contacto = new Contacto($request->all());
		$contacto->save();

		flash('Contacto: <strong>'. $contacto->nombre .'</strong>, agregado correctamente.')->success()->important();
		return redirect()->action('ContactosController@index');
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
		$contacto = Contacto::find($id);
		$clientes = Cliente::all()->sortBy('razon_social')->pluck('razon_social', 'id');
		return view('pages.contactos.edit', compact('contacto'))
			->with([
				'contacto' => $contacto,
				'clientes' => $clientes
			]);
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
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function destroy($id)
	{
		$contacto = Contacto::find($id);
		$contacto->delete();
		flash('Se ha borrado: <strong>'. $contacto->nombre .'</strong>, exitosamente!')
			->success()
			->important();
		return redirect()->action('ContactosController@index');
	}
}

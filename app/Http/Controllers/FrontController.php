<?php

namespace CRM\Http\Controllers;

use CRM\Mail\DocumentCreated;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use CRM\Http\Requests\DocumentoRequest;
use Illuminate\Support\Facades\DB;
use Yajra\Datatables\Datatables;
use Illuminate\Http\Request;
use Carbon\Carbon;
use CRM\User;
use CRM\Documento;
use CRM\Servicio;
use CRM\Contacto;
use CRM\Cliente;
use PDF;

class FrontController extends Controller
{

	public function __construct()
	{
		$this->middleware('auth', ['except' => ['show']]);
	}
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index()
	{
		$c_doctos = DB::table('documentos')
			->select('id')
			->where('deleted_at', '=', NULL)
			->count();
		$c_clientes = DB::table('clientes')->count();
		$c_comments = DB::table('comentarios')->count();

		$data = [
			'c_comments' => $c_comments,
			'c_clientes' => $c_clientes,
			'c_doctos' => $c_doctos
		];
		return view('pages.front.index')->with($data);
	}

	public function dataTables()
	{
		$documentos = DB::table('documentos')
			->select(['id', 'folio', 'fecha', 'razon_social', 'contacto_email'])
			->where('deleted_at', '=', NULL);

		
		return datatables()->of($documentos)
			->addColumn('action', function ($documento) {
				return '<div class="btn-group" role="group">
					<button id="btnGroupDrop1" type="button" type="button" class="btn btn-info btn-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Actiones</button>
					<div class="dropdown-menu" aria-labelledby="btnGroupDrop1">
						<a class="dropdown-item" href="' . route('showPDF', $documento->id) . '" target="_blank"><i class="fa fa-print fa-fw" aria-hidden="true"></i> PDF</a></li>
						<a class="dropdown-item" href="#" data-toggle="modal" data-target="#sendEmailModal" data-id="'. $documento->id .'" data-email="'. $documento->contacto_email .'"><i class="fa fa-envelope-o fa-fw" aria-hidden="true"></i> Enviar</a></li>
						<a class="dropdown-item" href="' . route('documentos.show', $documento->id) . '" target="_blank"><i class="fa fa-globe fa-fw" aria-hidden="true"></i> Web</a></li>
						<a class="dropdown-item" href="' . route('documentos.destroy', $documento->id) . '" onclick="return confirm(\'¿Deseas cancelarlo?\')"><i class="fa fa-ban fa-fw"></i> Cancelar</li></a>
					</div>
				</div>';
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
		$empresas = DB::table('clientes')->orderBy('razon_social')->pluck('razon_social', 'id');
		$asesores = DB::table('users')->orderBy('email')->pluck('name', 'id');
		$servicios = DB::table('servicios')->orderBy('nombre')->pluck('nombre', 'id');
		$next_folio = DB::table('documentos')->max('folio');
		return view('pages.documentos.create', compact('empresas', 'servicios', 'asesores', 'next_folio'));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(DocumentoRequest $request)
	{
		$documentos = new Documento($request->all());
		$servicio   = Servicio::find($request->get('id_servicio'));
		$cliente    = Cliente::find($request->get('id_cliente'));
		$contacto   = Contacto::find($request->get('id_contacto'));
		$asesor     = User::find($request->get('id_asesor'));
		$documentos->servicio_nombre    = $servicio->nombre;
		$documentos->direccion          = $cliente->direccion;
		$documentos->razon_social       = $cliente->razon_social;
		$documentos->asesor_nombre      = $asesor->name;
		$documentos->contacto_nombre    = $contacto->nombre;
		$documentos->contacto_email     = $contacto->email;
		$documentos->save();


		flash('Documento agregado correctamente.')->success()->important();
		return redirect()->action('FrontController@index');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function show($id)
	{
		$documento = Documento::find($id);
		return view('pages.documentos.show', compact('documento'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function edit($id)
	{
		//
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
		$documento = Documento::find($id);
		$documento->delete();
		flash('Se ha cancelado exitosamente!')->error()->important();
		return redirect()->action('FrontController@index');
	}

	public function sendEmail(Request $request)
	{
		$documento = Documento::find($request->id);
		$jefe = Cliente::find($documento->id_cliente);
		$user = \Auth::user();

		$emails = array();

		if (isset($request->copyJefe)) {
			array_push($emails, $jefe->email);
		}
		if (isset($request->copyMe)) {
			array_push($emails, $user->email);
		}

		// Generar el PDF 
		$pdf = PDF::loadView('pages.pdf.show', $documento);
		$file = 'app/public/pdfs/human_business_soporte_'.$documento->folio.'.pdf';

		if ($pdf->save(storage_path($file))) {
			if (!empty($emails)) {
				Mail::to($documento->contacto_email)->cc($emails)
					->send(new DocumentCreated($request->id, $documento->folio));
			} else {
				Mail::to($documento->contacto_email)
					->send(new DocumentCreated($request->id, $documento->folio));
			}
			flash('Documento enviado correctamente a: <strong>' . $documento->contacto_email . '</strong>')->success()->important();
			return redirect()->action('FrontController@index');
		} else {
			flash('Error al ejecutar la acction.')->error()->important();
			return redirect()->action('FrontController@index');
		}
	}
}

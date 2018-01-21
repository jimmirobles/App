<?php

namespace CRM\Http\Controllers;

use CRM\Mail\DocumentCreated;
use Illuminate\Support\Facades\Mail;
use CRM\Http\Requests\DocumentoRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use CRM\User;
use CRM\Documento;
use CRM\Servicio;
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
        // $documentos = DB::table('documentos')->orderBy('fecha')->paginate(10);
        $documentos = DB::table('documentos')
                        ->join('clientes', 'documentos.id_cliente', '=', 'clientes.id')
                        ->select('documentos.*', 'clientes.razon_social')
                        ->orderBy('id', 'dsc')
                        ->get();
        $cuenta = DB::table('documentos')->count();
        return view('pages.index', compact('documentos', 'cuenta'));
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
        $servicio = Servicio::find($request->get('id_servicio'));
        $cliente = Cliente::find($request->get('id_cliente'));
        $asesor = User::find($request->get('id_asesor'));
        $documentos['servicio_nombre'] = $servicio['nombre'];
        $documentos['direccion'] = $cliente['direccion'];
        $documentos['razon_social'] = $cliente['razon_social'];
        $documentos['asesor_nombre'] = $asesor['name'];
        $documentos->save();

        // $folio =  $request->get('folio');

        // dd($documentos);

        // Mail::to($reques->get['contacto_email'])->send(new DocumentCreated($folio));

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
        // dd($documento);
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
        //
    }

    public function sendEmail($id)
    {
        // Buscar el documento
        $documento = Documento::find($id);
        // Generar el PDF 
        $pdf = PDF::loadView('pages.pdf.show', $documento);
        
        // Guardarlo en el servidor, si es correcto lo envía 
        if ($pdf->save(storage_path('app/public/pdfs/human_business_soporte_'.$documento->folio.'.pdf'))) {
            Mail::to($documento->contacto_email)
                    ->send(new DocumentCreated($id, $documento->folio));
            flash('Documento enviado correctamente a: <strong>' . $documento->contacto_email . '</strong>')->success()->important();
            return redirect()->action('FrontController@index');
        } else {
            flash('Error al ejecutar la acction.')->error()->important();
            return redirect()->action('FrontController@index');
        }
    }
}

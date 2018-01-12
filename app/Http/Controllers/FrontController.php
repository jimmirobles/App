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
// use PDF;

class FrontController extends Controller
{
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

        $folio =  $request->get('folio');

        // dd($documentos);

        Mail::to('habannaslim@gmail.com')->send(new DocumentCreated($folio));

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
        $cliente = Cliente::find($documento->id_cliente);
        // dd($documento);
        return view('pages.documentos.show', compact('documento', 'cliente'));
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
}

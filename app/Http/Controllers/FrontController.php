<?php

namespace CRM\Http\Controllers;

use CRM\Http\Requests\DocumentoRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use CRM\Documento;

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
                        ->join('empresas', 'documentos.id_empresa', '=', 'empresas.id')
                        ->select('documentos.*', 'empresas.razon_social')
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
        $empresas = DB::table('empresas')->orderBy('razon_social')->pluck('razon_social', 'id');
        $asesores = DB::table('asesores')->orderBy('nombre')->pluck('nombre', 'id');
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
    public function store(Request $request)
    {
        $documentos = new Documento($request->all());
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
        $documento = DB::table('documentos')
                        ->select('documentos.*', 'empresas.*', 'asesores.nombre as nombreAsesor', 'servicios.nombre as nombreServicio')
                        ->join('servicios', 'documentos.id_servicio', '=', 'servicios.id')
                        ->join('empresas', 'documentos.id_empresa', '=', 'empresas.id')
                        ->join('asesores', 'documentos.id_asesor', '=', 'asesores.id')
                        ->where('documentos.id', $id)
                        ->get();
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
}

<?php

namespace CRM\Http\Controllers;

use CRM\Http\Requests\EmpresaRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use CRM\Empresa;

class EmpresasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $empresas = DB::table('empresas')->orderBy('razon_social')->paginate(9);
        return view('pages.empresas.index', compact('empresas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.empresas.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(EmpresaRequest $request)
    {
        $empresa = new Empresa($request->all());
        $empresa->save();

        flash('Empresa: <strong>'. $empresa->razon_social .'</strong>, agregada correctamente.')->success()->important();
        return redirect()->action('EmpresasController@index');
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
        $empresa = Empresa::find($id);
        return view('pages.empresas.edit', compact('empresa'));
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
        $empresa = Empresa::find($id);
        $empresa->fill($request->all());
        $empresa->save();

        flash('Se ha actualizado: <strong>'. $empresa->razon_social .'</strong>, correctamente.')->success()->important();
        return redirect()->action('EmpresasController@index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $empresa = Empresa::find($id);
        $empresa->delete();
        flash('Se ha borrado: <strong>'. $empresa->razon_social .'</strong>, exitosamente!')->error()->important();
        return redirect()->action('EmpresasController@index');
    }
}

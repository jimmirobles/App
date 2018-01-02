<?php

namespace CRM\Http\Controllers;

use CRM\Http\Requests\AsesorRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use CRM\Asesor;

class AsesoresController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $asesores = DB::table('asesores')->orderBy('nombre')->paginate(9);
        return view('pages.asesores.index', compact('asesores'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.asesores.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AsesorRequest $request)
    {
        $asesor = new Asesor($request->all());
        $asesor->save();

        flash('Asesor: '. $asesor->nombre .', agregado correctamente.')->success()->important();
        return redirect()->action('AsesoresController@index');
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
        $asesor = Asesor::find($id);
        return view('pages.asesores.edit', compact('asesor'));
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
        $asesor = Asesor::find($id);
        $asesor->fill($request->all());
        $asesor->save();

        flash('Se ha actualizado: <strong>'. $asesor->nombre .'</strong>, correctamente.')->success()->important();
        return redirect()->action('AsesoresController@index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $asesor = Asesor::find($id);
        $asesor->delete();
        flash('Se ha borrado: <strong>'. $asesor->nombre .'</strong>, exitosamente!')->error()->important();
        return redirect()->action('AsesoresController@index');
    }
}

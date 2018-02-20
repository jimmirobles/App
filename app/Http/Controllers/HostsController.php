<?php

namespace CRM\Http\Controllers;

use CRM\Host;
use Illuminate\Http\Request;
use CRM\Http\Requests\HostRequest;
use Illuminate\Support\Facades\DB;
use CRM\Cliente;

class HostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $hosts = DB::table('hosts')->orderBy('fecha_inicial')->paginate(9);
        return view('pages.hosts.index')
            ->with('hosts', $hosts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $clientes = Cliente::all()->sortBy('razon_social')->pluck('razon_social', 'id');
        return view('pages.hosts.create')
            ->with('clientes', $clientes);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(HostRequest $request)
    {
        $host = new Host($request->all());
        $cliente    = Cliente::find($request->get('cliente_id'));
        $host->cliente_nombre = $cliente->razon_social;
        $host->save();

        flash('Dominio: <strong>'. $host->dominio .'</strong>, agregado correctamente.')->success()->important();
        return redirect()->action('HostsController@index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \CRM\Host  $host
     * @return \Illuminate\Http\Response
     */
    public function show(Host $host)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \CRM\Host  $host
     * @return \Illuminate\Http\Response
     */
    public function edit(Host $host)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \CRM\Host  $host
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Host $host)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \CRM\Host  $host
     * @return \Illuminate\Http\Response
     */
    public function destroy(Host $host)
    {
        //
    }
}

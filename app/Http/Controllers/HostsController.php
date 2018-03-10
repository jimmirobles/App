<?php

namespace CRM\Http\Controllers;

use CRM\Http\Requests\HostRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Carbon\Carbon;
use CRM\Documento;
use CRM\Cliente;
use CRM\Host;

class HostsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        Carbon::setLocale('es');
    }

    public function index()
    {
        $hosts = Host::orderBy('fecha_final', 'ASC')->paginate(9);

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

        flash('Dominio: <strong>'. $host->dominio .'</strong>, agregado correctamente.')
            ->success()
            ->important();
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
    public function destroy($id)
    {
        $host = Host::find($id);
        $host->delete();
        flash('Se ha borrado <strong>'. $host->dominio .'</strong> exitosamente!')
            ->error()
            ->important();
        return redirect()->action('HostsController@index');
    }
}

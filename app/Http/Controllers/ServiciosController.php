<?php

namespace CRM\Http\Controllers;

use CRM\Http\Requests\ServicioRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
// use Laracasts\Flash\Flash;
use CRM\Documento;
use CRM\Servicio;

class ServiciosController extends Controller
{

    public function index()
    {
        $servicios = DB::table('servicios')
            ->orderBy('nombre')
            ->paginate(9);
        return view('pages.servicios.index')
            ->with('servicios', $servicios);
    }

    public function create()
    {
        return view('pages.servicios.create');
    }

    public function store(ServicioRequest $request)
    {
        $servicio = new Servicio($request->all());
        $servicio->save();

        flash('Servicio: <strong>'. $servicio->nombre .'</strong> agregado correctamente.')
            ->success()
            ->important();
        return redirect()->action('ServiciosController@index');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $servicio = Servicio::find($id);
        return view('pages.servicios.edit')
            ->with('servicio', $servicio);
    }

    public function update(Request $request, $id)
    {
        $servicio = Servicio::find($id);
        $servicio->fill($request->all());
        $servicio->save();

        flash('Se ha actualizado <strong>'. $servicio->nombre .'</strong> correctamente.')
            ->success()
            ->important();
        return redirect()->action('ServiciosController@index');
    }

    public function destroy($id)
    {
        if (Documento::where('id_servicio', '=', $id)->exists()) {
            flash('No se permite eliminar, ya existen documentos de este servicio.')
                ->error()
                ->important();
        }
        else {
            $servicio = Servicio::find($id);
            $servicio->delete();
            flash('Se ha borrado <strong>'. $servicio->nombre .'</strong> exitosamente!')
                ->error()
                ->important();
        }
        return redirect()->action('ServiciosController@index');
    }
}

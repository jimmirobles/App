<?php

namespace CRM\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use CRM\Documento;
use CRM\Cliente;
use PDF;

class ReportesController extends Controller
{
    //
    public function reporte1()
    {
    	$clientes = DB::table('clientes')->orderBy('razon_social')->pluck('razon_social', 'id');
    	return view('reportes.reporte1')->with('clientes', $clientes);
    }

    public function reporte1_view(Request $request)
    {
    	$documentos = Documento::where('id_cliente', '=', $request->id_cliente)
				->whereMonth('fecha', $request->mes)
				->get();

    	// return dd($documentos);

		$pdf = PDF::loadView('pages.pdf.reporte1', compact('documentos'));
		return $pdf->setPaper('letter', 'landscape')->stream();
    }
}

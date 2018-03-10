<?php

namespace CRM\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Carbon\Carbon;
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
		$total_horas = 0;
		$fecha1 = $request->fecha1;
		$fecha2 = $request->fecha2;

		$cliente = Cliente::find($request->id_cliente);

		$documentos = Documento::where('id_cliente', '=', $request->id_cliente)
				->whereBetween('fecha', [$request->fecha1, $request->fecha2])
				->get();

		foreach ($documentos as $key) {
			$dif = Carbon::parse($key['hInicial'])->diffInMinutes(Carbon::parse($key['hFinal']));
			$total_horas = $total_horas + $dif;
		}
		$horas = floor($total_horas / 60);
		$minutos = ($total_horas % 60);
		$total_horas = sprintf('%02d horas y %02d minutos', $horas, $minutos);

		// return dd($documentos);

		$pdf = PDF::loadView('pages.pdf.reporte1', compact('documentos', 'cliente', 'total_horas', 'fecha1', 'fecha2'));
		return $pdf->setPaper('letter', 'landscape')->stream();
	}
}

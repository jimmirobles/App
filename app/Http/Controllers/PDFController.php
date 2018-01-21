<?php

namespace CRM\Http\Controllers;

use Illuminate\Http\Request;
use CRM\Documento;
use PDF;

class PDFController extends Controller
{
	//
	public function show($id)
	{
		$documento = Documento::find($id);
		$pdf = PDF::loadView('pages.pdf.show', $documento);
		
		// if ($pdf->save(storage_path('app/public/pdfs/Soporte-'.$documento->folio.'.pdf'))) {
		// 	flash('PDF guardado en el servidor correctamente.')->success()->important();
		// 	return redirect()->action('FrontController@index');
		// } else {
		// 	flash('Error al ejecutar la acction.')->error()->important();
		// 	return redirect()->action('FrontController@index');
		// }

		return $pdf->stream();

		// return view('pages.pdf.show', $documento);
	}
}

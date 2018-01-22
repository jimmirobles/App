<?php

namespace CRM\Http\Controllers;

use Illuminate\Support\Facades\Storage;
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

		return $pdf->stream();
	}

	public function delete_all()
	{
		$folder = 'public/pdfs';

		Storage::deleteDirectory($folder);
		Storage::makeDirectory($folder);

		return redirect()->action('FrontController@index');
	}
}

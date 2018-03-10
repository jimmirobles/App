<?php

namespace CRM\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use CRM\Comentario;

class ComentariosController extends Controller
{
	function __construct()
	{
        $this->middleware('auth', ['except' => ['store']]);
	}
    //

    public function index()
    {
        $comentarios = DB::table('comentarios')
                    ->join('documentos', 'comentarios.id_documento', '=', 'documentos.id')
                    ->select('comentarios.*', 'documentos.razon_social as nombreCliente')
                    ->orderBy('id', 'dsc')
                    ->paginate(9);
        return view('pages.comentarios.index')->with('comentarios', $comentarios);
    }

    public function store(Request $request)
    {
    	$comentario = new Comentario($request->all());
    	$comentario->save();

    	alertify()->success('Gracias por tus comentarios.')->position('bottom right');
    	return redirect()->back();
    }
}

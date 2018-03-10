<?php

namespace CRM\Http\Controllers;

use CRM\Servicio;
use CRM\Contacto;
use CRM\Cliente;
use Excel;

class ExcelController extends Controller
{

    public function exportar_excel($tipo)
    {

        switch ($tipo){
            case 'clientes':
                $data = Cliente::select('id', 'razon_social', 'rfc', 'direccion', 'email')
                    ->get();
                break;
            case 'servicios':
                $data = Servicio::select('id', 'nombre')
                    ->get();
                break;
            case 'contactos':
                $data = Contacto::select('id', 'nombre', 'email')
                    ->get();
                break;
        }

        Excel::create('Todos los '.$tipo, function($excel) use($data) {
            $excel->sheet('Exportacion', function($sheet) use($data) {

                $sheet->fromArray($data);

            });
        })->export('xlsx');
    }

    public function exportar_csv($tipo)
    {

        switch ($tipo) {
            case 'clientes':
                $data = Cliente::select('id', 'razon_social', 'rfc', 'direccion', 'email')
                    ->get();
                break;
            case 'servicios':
                $data = Servicio::select('id', 'nombre')
                    ->get();
                break;
            case 'contactos':
                $data = Contacto::select('id', 'nombre', 'email')
                    ->get();
                break;
        }

        Excel::create('Todos los ' . $tipo, function ($excel) use ($data) {
            $excel->sheet('Exportacion', function ($sheet) use ($data) {

                $sheet->fromArray($data);

            });
        })->export('csv');
    }
}

<?php

namespace CRM\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DocumentoRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'fecha'             => 'string|required',
            'hInicial'          => 'string|required',
            'hFinal'            => 'string|required',
            'id_contacto'       => 'required',
            'id_cliente'        => 'required',
            'id_servicio'       => 'required',
            'id_asesor'         => 'required'
        ];
    }
}

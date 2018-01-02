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
            'hInicial'      => 'required',
            'hFinal'        => 'required',
            'fecha'         => 'required',
            'id_empresa'    => 'required',
            'id_sistema'    => 'required',
            'id_asesor'     => 'required'
        ];
    }
}

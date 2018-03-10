<?php

namespace CRM\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class HostRequest extends FormRequest
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
            'cliente_id'        => 'required',
            'dominio'           => 'required',
            'fecha_inicial'     => 'required',
            'fecha_final'       => 'required'
        ];
    }
}

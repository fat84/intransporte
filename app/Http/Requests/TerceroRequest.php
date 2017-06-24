<?php

namespace intransporte\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TerceroRequest extends FormRequest
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
            'nombre' => 'required|string|max:255',
            'tipo_persona' => 'required|string|max:255',
            'tipo_documento' => 'required|string|min:2|confirmed',
            'documento' => 'required|string|min:5|unique:tercero',
            'correo' => 'string|email:unique:tercero',
        ];
    }
}

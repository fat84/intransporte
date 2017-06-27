<?php

namespace intransporte\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ObraRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            //
            'nombre'=>'required|string|min:5|max:255',
            'direccion'=>'required|string|min:5',
            'telefono' => 'nullable|string|min:6',
            'ciudad_id' => 'required|integer',
            'encargado' => 'nullable|string',
            'tercero_id' => 'required|integer',
        ];
    }
}
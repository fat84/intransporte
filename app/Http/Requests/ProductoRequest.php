<?php

namespace intransporte\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductoRequest extends FormRequest
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
            //
            'codigo' => 'required|string|min:5|max:50',
            'nombre' => 'required|string|min:5|max:255',
            'valor_und' => 'required|numeric|min:0,max:99999999',
            'impuesto' => 'required|numeric|min:0|max:100',
            'unidad_medida' => 'required|string|min:1|max:10',
            'es_servicio' => 'required|int|min:0|max:1',
        ];
    }
}

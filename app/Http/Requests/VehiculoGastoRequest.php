<?php

namespace intransporte\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use intransporte\Vehiculo;

class VehiculoGastoRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return !\Auth::guest();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'vehiculo_id' => 'Required|int|min:1',
            'user_id' => 'required|int|min:1',
            'valor' => 'required|numeric|min:0|max:99999999',
            'concepto' => 'required|string|min:1|max:255',
            'fecha' => 'required|date|after:yesterday'
        ];
    }
}

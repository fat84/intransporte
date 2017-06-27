<?php

namespace intransporte\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class VehiculoRequest extends FormRequest
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
            'placa' => 'required|string|max:255',
            'marca' => 'required|string|max:255',
            'modelo' => 'required|int|max:9999|min:1900',
        ];
    }
}

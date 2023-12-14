<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class storeVisitanteParqueadero extends FormRequest
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
            'nombre'=> 'required|max:255',
            'cedula'=> 'required|min:6|max:10',
            'telefono'=> 'required|min:6|max:10',
            'apto_id'=> 'required',
            'placa'=>'required|min:6'
        ];
    }
    public function attributes()
    {
        return [
            'nombre'=> 'Nombre Completo',
            'cedula'=> 'Número de documento',
            'telefono'=> 'Número de telefono',
            'apto_id'=> 'Apartamento',
            'placa'=>'Placa'
        ];
    }
}

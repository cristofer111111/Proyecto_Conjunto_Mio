<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class storeResidente extends FormRequest
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
            'email'=> 'required|max:255|email:rfc,dns',
            'tipo_residente'=> 'required|max:255',
            'apto_id'=>'required',
            'torre_id'=>'required'
        ];
    }
    public function attributes()
    {
        return [
            'nombre'=> 'Nombre Completo',
            'cedula'=> 'Número de documento',
            'telefono'=> 'Número de telefono',
            'email'=> 'Correo',
            'tipo_residente'=> 'Tipo de residente',
            'apto_id'=>'Apartamento',
            'torre_id'=>'Torre'
        ];
    }
}

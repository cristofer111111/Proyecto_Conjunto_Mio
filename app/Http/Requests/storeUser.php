<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class storeUser extends FormRequest
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
            'cargo'=> 'required|max:255',
            'observaciones'=>'required'
        ];
    }
    public function attributes()
    {
        return [
            'nombre'=> 'Nombre Completo',
            'cedula'=> 'Número de documento',
            'telefono'=> 'Número de telefono',
            'email'=> 'Correo',
            'cargo'=> 'Cargo',
            'observaciones'=>'Observaciones'
        ];
    }
}

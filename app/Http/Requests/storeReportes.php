<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class storeReportes extends FormRequest
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
            'title'=> 'required|max:255',
            'clasification'=> 'required|max:255',
            'description'=> 'required|min:200'
        ];
    }
    public function attributes()
    {
        return [
            'title'=> 'Titulo',
            'clasification'=> 'Clasificación',
            'description'=> 'Descripción'
        ];
    }
}

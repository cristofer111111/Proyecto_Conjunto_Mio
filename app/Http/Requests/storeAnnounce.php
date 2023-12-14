<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class storeAnnounce extends FormRequest
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
            'announceTitle'=> 'required|max:255',
            'announcePersons'=> 'required|max:255',
            'announceMessage'=> 'required|min:100'
        ];
    }
    public function attributes()
    {
        return [
            'announceTitle'=> 'Titulo',
            'announcePersons'=> 'Usuarios',
            'announceMessage'=> 'Mensaje'
        ];
    }
}

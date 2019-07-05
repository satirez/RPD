<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

use ValidateRequests;

class UpdateFormat extends FormRequest
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
            'name' => 'required|max:20',
            'largo' => 'required|max:20'
            'alto' => 'required|max:20'
            'ancho' => 'required|max:20'
            
        ];
    }

    public function messages(){
        return [
            'name.required' => 'Falta un campo obligatorio',
            'largo.required' => 'Falta un campo obligatorio'
            'alto.required' => 'Falta un campo obligatorio'
            'ancho.required' => 'Falta un campo obligatorio'
      
        ];
    }
}

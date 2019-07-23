<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

use ValidateRequests;

class StoreFormat extends FormRequest
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
            'name' => 'required|max:20|unique:name',
            'weight' => 'required|max:20',
  
        ];
    }

    public function messages(){
        return [
            'name.required' => 'Debe ingresar el nombre del formato',
            'weight.required' => 'Debe ingresar un Peso',
            ];
    }
}

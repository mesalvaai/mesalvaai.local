<?php

namespace App\Http\Requests\Financing;

use Illuminate\Foundation\Http\FormRequest;

class StoreFinancingRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name'    =>'required|min:7|max:100',
            'email'   =>'required|unique:students',
            'phone'   =>'required|integer',
            'how_met_us' => 'required',
            'state_id'   =>'required',
            'cidade_id' =>'required'
        ];
    }
    
    public function messages(){
        return [
            'required' => 'O campo ":attribute" é obrigatório!',
            'numeric' => 'O campo ":attribute" deve ser um número!',
            'min' => 'O campo ":attribute" deve ter no mínimo :min caracteres!',
            'max' => 'O campo ":attribute" deve ter no maximo :max caracteres!',
            'type.required' => 'O campo "tipo" é obrigatório!',
            'unique' => 'Este ":attribute" já se encontra cadastrado no sistema!'
        ];
    }
}

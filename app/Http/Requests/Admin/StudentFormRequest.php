<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class StudentFormRequest extends FormRequest
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
            'name'    =>'required|min:3|max:100',
            'cpf'     =>'required|unique:students|integer',
            'email'   =>'required|unique:students',
            'data_of_birth' => 'required|date',
            'phone'   =>'required|integer',
            'cep'     =>'required|integer',
            'state'   =>'required',
            'cidade_id' =>'required',
            'street'  =>'required',
            'number'  =>'required',
            'neighborhood' =>'required',
            'complement'   =>'required',
            'status'  =>'required'
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

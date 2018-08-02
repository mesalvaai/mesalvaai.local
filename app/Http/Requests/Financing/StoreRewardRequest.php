<?php

namespace App\Http\Requests\Financing;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class StoreRewardRequest extends FormRequest
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
    public function rules(Request $request)
    {
        $rules = [];
        $rules = [
            'title'    =>'required|min:10|max:100',
            'donation'   =>'required',
            'description'   =>'required',
            'delivery_date' => 'required',
            'delivery_mode' => 'required'
        ];

        // if ($this->attributes->has('some-key')) {
        //      $rules['other-key'] = 'required|unique|etc';
        // }
        // if ($this->attributes->get('some-key') == 'some-value') {
        //     $rules['my-key'] = 'in:a,b,c';
        //}

        if ($request['quantity'] == null and $request['unlimited'] == null) {
              $rules['quantity'] = 'required';
        }

        // if ($this->attributes->get('some-key') == 'some-value') {
        //     $this->attributes->set('key', 'value');
        // }

        return $rules;
    }
    
    public function messages(){
        return [
            'required' => 'O campo ":attribute" é obrigatório!',
            'numeric' => 'O campo ":attribute" deve ser um número!',
            'min' => 'O campo ":attribute" deve ter no mínimo :min caracteres!',
            'max' => 'O campo ":attribute" deve ter no maximo :max caracteres!',
            'unique' => 'Este ":attribute" já se encontra cadastrado no sistema!',
            'quantity.required' => 'Precissa prencher uma quantidade ou selecionar ilimitado',
        ];
    }
}

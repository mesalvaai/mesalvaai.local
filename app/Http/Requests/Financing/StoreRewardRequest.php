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
            'title'    =>'required|min:5|max:100',
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
        'numeric' => 'O campo ":attribute" deve ser um número.',

        'title.min' => 'O título da sua recompensa deve ter no mínimo :min caracteres.',
        'title.max' => 'O título da sua recompensa deve ter no máximo :max caracteres.',

        'title.required' => 'Você deve escolher um título para a sua recompensa.',
        'donation.required' => 'O campo de doação é obrigatório.',
        'description.required' => 'O campo de descrição é obrigatório.',
        'delivery_mode.required' => 'Você deve selecionar um meio de entrega para a sua recompensa.',
        'quantity.required' => 'Você precisa prencher uma quantidade ou selecionar ilimitado.',
    ];
}
}

<?php

namespace App\Http\Requests\Donations;

use Illuminate\Foundation\Http\FormRequest;
use MyFunctions;
class DonationsRequest extends FormRequest
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
        //dd('test validate');
        switch($this->method()) {
            case "GET":
            case "DELETE": {
                return [];
            }
            case "POST": // CRIAÇÃO DE UM NOVO REGISTRO
                $rules = [];
                $rules = [
                    'full_name' => 'required|max:100',
                    'phone' => 'required|max:15',
                    'email' => 'email|max:200|required',
                    'date_of_birth' => 'date_format:"d/m/Y"',
                    'cpf' => 'required|cpf|max:14',
                    'total_amount' => [function ($attribute, $value, $fail) {
                        $valor = MyFunctions::FormatCurrencyForScreen($value);
                        if ($valor < 10) {
                            $fail('O valor mínimo de doação é R$ 10,00');
                        }
                    }]
                ];
                if ($this->type_payment === 'CREDIT_CARD') {
                    $rules['card_number']   = 'required|max:19';
                     $rules['card_name']    = 'required';
                     $rules['card_cvc']     = 'required|numeric';
                     $rules['month']        = 'required|numeric';
                     $rules['year']         = 'required|numeric';
                }
                
                return $rules;
                break;
            case "PUT": // ATUALIZAÇÃO DE UM REGISTRO EXISTENTE
                return [
                    'full_name' => 'required|max:100',
                    'phone' => 'required|max:15',
                    'email' => 'email|max:200|unique:donations,email,'.$this->id,
                    'date_of_birth' => 'date_format:"d/m/Y"',
                    'cpf' => 'required|cpf|max:15'
                ];
                break;
            case 'PATCH': {
                return [];
            }
            default:break;
        }
    }

    public function messages()
    {
        return [
            'full_name.required' => 'O Nome é obrigatório',
            'phone.required' => 'O Telefone é obrigatório',
            'email.email' => 'Informe um e-mail válido',
            'date_of_birth.date_format' => 'A data de nacimento deve ser no formato DD/MM/AAAA',
            'cpf.required' => 'O CPF é obrigatório',
            'total_amount.required' => 'O Valor é obrigatório',
            'card_number.required' => 'O numero do cartão é obrigatorio',
            'card_name.required' => 'O Nome do Titular é obrigatorio',
            'card_cvc.required' => 'O CVS do cartão é obrigatorio',
            'card_cvc.numeric' => 'O CVS têm que ser só numeros',
            'month.required' => 'O mês de Validade é obrigatorio',
            'month.numeric' => 'O mês têm que ser só numeros',
            'year.required' => 'O ano de Validade é obrigatorio',
            'year.numeric' => 'O ano têm que ser só numeros'
        ];
    }
}

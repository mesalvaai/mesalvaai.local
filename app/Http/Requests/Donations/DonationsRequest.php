<?php

namespace App\Http\Requests\Donations;

use Illuminate\Foundation\Http\FormRequest;

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
        //dd($this->total_amount);
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
                    'email' => 'email|max:200|unique:donations',
                    'date_of_birth' => 'date_format:"d/m/Y"',
                    'cpf' => 'required|max:14'
                ];
                if ($this->total_amount < 20) {
                    $rules['total_amount'] = 'min:20';
                }
                return $rules;
                break;
            case "PUT": // ATUALIZAÇÃO DE UM REGISTRO EXISTENTE
                return [
                    'full_name' => 'required|max:100',
                    'phone' => 'required|max:15',
                    'email' => 'email|max:200|unique:donations,email,'.$this->id,
                    'date_of_birth' => 'date_format:"d/m/Y"',
                    'cpf' => 'required|max:15'
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
            'total_amount.min' => 'O Valor minimo é $R 20.00'
        ];
    }
}

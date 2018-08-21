<?php

namespace App\Http\Requests\Financing;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;

class StoreCampingRequest extends FormRequest
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
     * 'document.*' => 'required|file|mimes:ppt,pptx,doc,docx,pdf,xls,xlsx|max:204800',
     * @return array
     */
    public function rules()
    {
        return [
            'title'    =>'required|min:5|max:250',
            'abstract'    =>'required|min:5|max:160',
            'description'   =>'required|min:5',
            'start_date'   =>'required',
            'end_date'   =>'required',
            'file_path' => 'file|mimes:png,gif,jpg,jpeg,mp4',
            'goal' => 'required',
            'student_id'   =>'required|integer',
            'category_id' =>'required|integer',
            'terms_of_use' => 'required|integer'
        ];
    }
    
    public function messages(){
        return [
            'numeric' => 'O campo ":attribute" deve ser um número.',
          
            'title.min' => 'O título da sua campanha deve ter no mínimo :min caracteres.',
            'abstract.min' => 'O resumo da sua campanha deve ter no mínimo :min caracteres.',
            'description.min' => 'A descrição da sua campanha deve ter no mínimo :min caracteres.',
          
            'title.max' => 'O título da sua campanha deve ter no máximo :max caracteres.',
            'abstract.max' => 'O resumo da sua campanha deve ter no máximo :max caracteres.',
            'description.max' => 'A descrição da sua campanha deve ter no máximo :max caracteres.',

            'category_id.required' => 'Você deve selecionar uma categoria para a sua campanha.',
            'title.required' => 'O campo de titulo da campanha é obrigatório.',
            'abstract.required' => 'O campo de resumo é obrigatório.',
            'description.required' => 'O campo de descrição é obrigatório.',
            'goal.required' => 'O campo de meta deve ser preenchido.',

            'terms_of_use.required' => 'Você deve aceitar os termos de uso.',
            'unique' => 'Este ":attribute" já se encontra cadastrado no sistema.',
            'mimes' => 'A extensão do arquivo deve ser do tipo: png, gif, jpg, jpeg, mp4.',
        ];
    }
}

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
            'description'   =>'required',
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
            'required' => 'Este campo é obrigatório!',
            'numeric' => 'O campo ":attribute" deve ser um número!',
            'min' => 'O campo ":attribute" deve ter no mínimo :min caracteres!',
            'max' => 'O campo ":attribute" deve ter no maximo :max caracteres!',
            'title.required' => 'O nome da campanha é obrigatório!',
            'unique' => 'Este ":attribute" já se encontra cadastrado no sistema!',
            'mimes' => 'A extensão do arquivo deve ser do tipo: png, gif, jpg, jpeg, mp4.',
        ];
    }
}

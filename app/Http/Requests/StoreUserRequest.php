<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUserRequest extends FormRequest
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
            'nomeLaboratorio'=>'required',
            'logradouro'=>'required',
        ];
    }
    public function messages()
    {
        return[
            'nomeLaboratorio.required' => 'O nome é obrigatorio.',
            'logradouro.required' => 'O logradouro é obrigatorio.'
        ];


    }
}

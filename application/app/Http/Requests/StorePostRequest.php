<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePostRequest extends FormRequest
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
            'descricao' => 'required|min:5|max:100|string',
            'conteudo'  => 'required|min:5|string'
        ];
    }

    public function messages() {
        return [
            'descricao.required' => 'O campo descricao é obrigatório.',
            'descricao.min' => 'A descrição não tem o número mínimo de caracteres que são 5',
            'conteudo.required' => 'O campo conteudo é obrigatório.'
        ];
    }

}

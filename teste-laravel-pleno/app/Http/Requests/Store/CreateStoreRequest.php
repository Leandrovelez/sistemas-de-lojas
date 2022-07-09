<?php

namespace App\Http\Requests\Store;

use Illuminate\Foundation\Http\FormRequest;

class CreateStoreRequest extends FormRequest
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
            'name' => 'string|min:3|max:40',
            'email' => 'string|email|unique:stores,email'
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'name.string' => 'O nome deve ser um texto',
            'name.min' => 'O nome deve conter no mínimo :min letras',
            'name.max' => 'O nome deve conter no máximo :max letras',
            'email.string' => 'O e-mail deve ser um texto',
            'email.email' => 'O e-mail deve ser um endereço de e-mail válido',
            'email.unique' => 'Esse e-mail já existe na base de dados'
        ];
    }
}

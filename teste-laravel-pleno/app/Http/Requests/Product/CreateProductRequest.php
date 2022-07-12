<?php

namespace App\Http\Requests\Product;

use Illuminate\Foundation\Http\FormRequest;

class CreateProductRequest extends FormRequest
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
            'name' => 'string|min:3|max:60',
            'value' => 'integer|digits_between:2,6',
            'store_id' => 'integer|exists:stores,id'
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
            'value.digits_between' => 'O valor deve conter 2 e 6 dígitos',
            'store_id.integer' => 'O id deve um número',
            'store_id.exists' => 'Não foi encontrada uma loja com esse id'
        ];
    }
}

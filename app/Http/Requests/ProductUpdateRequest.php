<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductUpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'string|max:200|required',
            'description' => 'string|max:200|required',
            'price' => 'numeric|string|max:100|required',
            'amount' => 'numeric|string|max:100|required',
        ];
    }


       /**
     * Get the validation messages that apply to the rules.
     *
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'name.string' => 'O campo nome deve ser uma string.',
            'name.max' => 'O campo nome deve ter no máximo :max caracteres.',
            'name.required' => 'O campo nome é obrigatório.',

            'description.string' => 'O campo de descrição deve ser uma string.',
            'description.max' => 'O campo de descrição deve ter no máximo :max caracteres.',
            'description.required' => 'O campo de descrição é obrigatório.',

            'price.string' => 'O campo de preço deve ser uma string.',
            'price.max' => 'O campo de preço deve ter no máximo :max caracteres.',
            'price.required' => 'O campo de preço é obrigatório.',
            'price.numeric' => 'O campo preço deve ser numérico',

            'amount.string' => 'O campo quantidade deve ser uma string.',
            'amount.max' => 'O campo quantidade deve ter no máximo :max caracteres.',
            'amount.required' => 'O campo quantidade é obrigatório.',
            'amount.numeric' => 'O campo quantidade deve ser numérico',
        ];
    }
}

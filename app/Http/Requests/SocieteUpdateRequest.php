<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SocieteUpdateRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
        'nom'=>'string',
        'telephone'=>'string|max:8',
        'adresse'=>'string',
        'ville'=>'string',
        'pays'=>'string',
        'fax'=>'string',
        'email'=>'string',
        ];
    }
    public function messages(): array
    {
        return [
            'nom'=>'veuillez choisir le nom de la société',
            'telephone'=>'veuillez choisir le telephone de la société',
            'adresse'=>'veuillez choisir l adresse de la société',
            'ville'=>'veuillez choisir la ville de la société',
            ];
    }
}

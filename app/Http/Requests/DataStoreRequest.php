<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DataStoreRequest extends FormRequest
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
            'annee'=>'required|regex:/^\d{4}-\d{4}$/',
        ];
    }


    public function messages(): array
    {
        return [
        'annee'=>'veuillez remplir le champ annee-scolaire',
        'annee.regex' => 'Le format de l\'année scolaire doit être "xxxx-xxxx" (par exemple, 2022-2023).',
        ];
    }
}

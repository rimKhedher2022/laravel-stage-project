<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MessageDeRappelUpdateRequest extends FormRequest
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
            'titre'=>'string', 
            'description'=>'string',
          
        ];
    }
    public function messages(): array
    {
        return [
            'titre'=>'veuillez écrire le titre du message du rappel', 
            'description'=>'veuillez écrire la description du message du rappel',
        ];
    }
}

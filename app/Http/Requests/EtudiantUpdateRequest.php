<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EtudiantUpdateRequest extends FormRequest
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
            'nom' => 'string',
            'prenom' => 'string',
            'email' => 'string | email ' ,
            'password' => 'string',
            'cin'=>'string',
            'niveau'=>'string',
            'specialite'=>'string',
            'numero_inscription'=>'string',
            'diplôme'=>'string',
        ];
    }
}

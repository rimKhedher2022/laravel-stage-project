<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RapportUpdateRequest extends FormRequest
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
            'filePath'=> 'required|mimes:pdf,docx|max:5120',
            'titre'=>'string',
            'date_depot'=>'date',
            // 'stage_id'=>'string',
        ];
    }

    public function messages()
    {
        return [
            'filePath'=> 'veuillez choisir votre document l ajouter au lieu de l ancien rapport',
            'titre'=> 'veuillez choisir le titre de votre document',
        ];
    }
        
}

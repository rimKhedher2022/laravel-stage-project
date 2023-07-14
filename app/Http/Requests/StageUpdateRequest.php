<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StageUpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true ;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'type'=>'string',
            'sujet'=>'string',
            'date_debut'=>'date',
            'date_fin'=>'date',
            'societe_id'=>'string',
            // 'etat'=>'string',
            'date_soutenance'=>'date',
            'etudiant_id'=>'string',
            'enseignant_id'=>'string',
            
        ];
    }


    public function messages() :array
    {
        return [
            'type'=>'veuillez choisir le type de votre stage',
            'sujet'=>'veuillez choisir le sujet de votre stage',
            'date_debut'=>'veuillez choisir la date debut de votre stage',
            'date_fin'=>'veuillez choisir la date fin de votre stage',
            'societe_id'=>'veuillez choisir la societe de votre stage',
            // 'etat'=>'required',
            'date_soutenance'=>'veuillez choisir la date soutenance',
        ];
    }
}

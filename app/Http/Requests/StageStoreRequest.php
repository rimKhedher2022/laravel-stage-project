<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StageStoreRequest extends FormRequest
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
            'type'=>'required',
            'sujet'=>'required',
            'date_debut'=>'required',
            'date_fin'=>'required',
            'societe_id'=>'required',
            // 'etat'=>'required',
           
        ];
    }
    public function messages()
    {
        return [
            'type'=>'veuillez choisir le type de votre stage',
            'sujet'=>'veuillez choisir le sujet de votre stage',
            'date_debut'=>'veuillez choisir la date debut de votre stage',
            'date_fin'=>'veuillez choisir la date fin de votre stage',
            'societe_id'=>'veuillez choisir la societe de votre stage',
            // 'etat'=>'required',
           
        ];
    }
}

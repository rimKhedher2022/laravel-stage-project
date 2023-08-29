<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SessionDeDepotStoreRequest extends FormRequest
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
            'date_debut'=>'required',
             'date_fin'=>'required', 
             'type_stage'=>'required', 
            //  'user_id'=>'required',
        ];
    }
    public function messages(): array
    {
        return [
            'date_debut'=>'veuillez choisir la date de début',
             'date_fin'=>'veuillez choisir la date de fin', 
             'type_stage'=>'veuillez choisir le type', 
        ];
    }
}

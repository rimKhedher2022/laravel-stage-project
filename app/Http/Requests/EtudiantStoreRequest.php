<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EtudiantStoreRequest extends FormRequest
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
// validation des inputs 
            'nom' => 'required',
            'prenom' => 'required',
            'email' => 'required',
            'role' =>'required',
            'password' => 'required',
            'cin'=>'required',
            'niveau'=>'required',
            'specialite'=>'required',
            'numero_inscription'=>'required',
            
        ];
    }
}

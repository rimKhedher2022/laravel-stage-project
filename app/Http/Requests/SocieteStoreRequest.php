<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SocieteStoreRequest extends FormRequest
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
        'nom'=>'required',
        'telephone'=>'required',
        'adresse'=>'required',
        'ville'=>'required',
        'pays'=>'required',
        'fax'=>'required',
        'email'=>'required',
        ];
    }
    public function messages(): array
    {
        return [
        'nom'=>'veuillez choisir le nom de société',
        'telephone'=>'veuillez choisir le telephone de société',
        'adresse'=>'veuillez choisir l adresse de société',
        'ville'=>'veuillez choisir la ville de société',
        'pays'=>'veuillez choisir la pays de société',
        'fax'=>'veuillez choisir la fax de société',
        'email'=>'veuillez choisir la email de société',
        ];
    }
}

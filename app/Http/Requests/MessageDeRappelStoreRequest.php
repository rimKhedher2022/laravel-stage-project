<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MessageDeRappelStoreRequest extends FormRequest
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
          
            'stage_id'=>'string',
            'description'=>'required',
           
           
        ];
    }

    public function messages(): array
    {
        return [
        'description'=>'veuillez remplir le champ Message',
        ];
    }
}

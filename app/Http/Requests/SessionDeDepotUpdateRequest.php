<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SessionDeDepotUpdateRequest extends FormRequest
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
            'date_debut'=>'date',
            'date_fin'=>'date', 
            'type_stage'=>'string', 
            // 'user_id'=>'string',
        ];
    }
}

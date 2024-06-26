<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCode extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'email' => 'required|exists:users,email',
        ];
    }

    public function messages() {
        return [
            'email.required' => 'Debe completar este campo',
            'email.exists' => 'Este correo no existe',
            // 'email.unique' => 'Ya hay un código asociado a este correo',
        ];
    }
}

<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePassword extends FormRequest
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
            'password' => 'required|confirmed|min:8'
        ];
    }

    public function messages() {
        return [
            'password.required' => 'Debe de completar este campo',
            'password.confirmed' => 'Las constraseñas no coinciden',
            'password.min' => 'La contraseña debe ser de 8 caracteres por lo menos',
        ];
    }
}

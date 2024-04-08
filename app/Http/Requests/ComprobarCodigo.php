<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ComprobarCodigo extends FormRequest
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
            'code' => 'required|exists:password_reset_tokens,token|size:6'
        ];
    }

    public function messages() {
        return [
            'code.required' => 'Debe completar este campo',
            'code.exists' => 'Compruebe que haya colocado bien el código',
            'code.size' => 'Código erroneo'
        ];
    }
}

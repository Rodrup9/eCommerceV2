<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class Vendedor extends FormRequest
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
            'tienda' => 'required|min:5|regex:/^[\pL\s\-]+$/u',
            'correo' => 'required|email|unique:users,email',
            'telefono' => 'required|numeric',
            'descripcion' => 'required|regex:/^[\pL\s\-]+$/u',
            'direccion' => 'required|min:5'
        ];
    }

    public function messages() {
        return [
            'tienda.required' => 'Debe de completar este campo',
            'tienda.min' => 'Su nombre es demasiado corto',
            'tienda.regex' => 'Solo se admiten letras',

            'correo.required' => 'Debe de completar este campo',
            'correo.unique' => 'Este correo ya existe',

            'telefono.required' => 'Debe de completar este campo',
            'telefono.numeric' => 'Solo se aceptan numeros',

            'descripcion.required' => 'Debe de completar este campo',
            'descripcion.regex' => 'Solo se admiten letras',

            'direccion.required' => 'Debe de completar este campo',
            'direccion.min' => 'Demasiado corto',
        ];
    }
}

<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class Perfil extends FormRequest
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
        $userId = Auth::user()->id;

        return [
            'username' => 'sometimes|required|min:6|alpha_num:ascii|unique:users,nombre_de_usuario,' . $userId,
            'nombre' => 'required|min:2|regex:/^[\pL\s\-]+$/u',
            'apellido_pa' => 'required|min:3|regex:/^[\pL\s\-]+$/u',
            'apellido_ma' => 'required|min:3|regex:/^[\pL\s\-]+$/u',
            'email' => 'sometimes|required|email|unique:users,email,' . $userId,
        ];
    }

    public function messages() {
        return [
            'username.alpha' => 'No ingrese caracteres especiales',
            'username.required' => 'Debe de completar este campo',
            'username.min' => 'El nombre debe tener por lo menos 6 caracteres',
            'username.alpha_num' => 'No se admite caracteres especiales ni espacios',
            'username.unique' => 'Este nombre de usuario ya existe',

            'nombre.required' => 'Debe de completar este campo',
            'nombre.min' => 'Su nombre es demasiado corto',
            'nombre.regex' => 'Solo se admiten letras',

            'apellido_pa.required' => 'Debe de completar este campo',
            'apellido_pa.min' => 'Su apellido paterno es demasiado corto',
            'apellido_pa.regex' => 'Solo se admiten letras',

            'apellido_ma.required' => 'Debe de completar este campo',
            'apellido_ma.min' => 'Su apellido materno es demasiado corto',
            'apellido_ma.regex' => 'Solo se admiten letras',

            'email.required' => 'Debe de completar este campo',
            'email.unique' => 'Este correo ya existe',
        ];
    }
}

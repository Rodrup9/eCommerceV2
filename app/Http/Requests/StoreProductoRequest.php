<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProductoRequest extends FormRequest
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
            "nombre" => "required|min:10",
            "descripcion" => "required|max:10000",
            "precio" => "required",
            "cantidad" => "required|min:1|max:1000",
            // "imagen" => "required",
            "tipo_envio" => "required",
            "categorias" => "required",
            "direccion" => "required"
        ];
    }
}

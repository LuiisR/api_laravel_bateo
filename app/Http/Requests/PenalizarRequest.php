<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PenalizarRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        // esto es para los roles y habilidades
        // lo dejo en true porque no está realizado los roles
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
            // exists significa que el valor recibido en la petición ya debe existir en la bbdd
            "tanda_id" => "required|exists:tandas,id",
            "participante_id" => "required|exists:participantes,id",
            "penalizacion_id" => "required|exists:penalizaciones,id"
        ];
    }
}

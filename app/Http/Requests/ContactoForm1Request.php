<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactoForm1Request extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true; //no hay que verificar auth
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'nombre'      => ['required', 'string', 'max:100'],
            'email'       => ['required', 'email', 'max:150'],
            'asunto'      => ['required', 'string', 'max:150'],
            'mensaje'     => ['required', 'string', 'max:2000'],
            'estilos'     => ['nullable', 'array'],
            'estilos.*'   => ['string', 'max:50'],
            'pais'        => ['nullable', 'string', 'max:50'],
            'rango_edad'  => ['nullable', 'string', 'max:20'],
            'favoritos'   => ['nullable', 'array', 'max:5'],
            'favoritos.*' => ['nullable', 'string', 'max:150'],
        ];
    }
}

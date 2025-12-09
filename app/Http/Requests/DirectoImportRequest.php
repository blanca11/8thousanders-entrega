<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DirectoImportRequest extends FormRequest
{
    public function authorize()
    {
        return true; // Ya está protegido por middleware auth
    }

    public function rules()
    {
        return [
            'csv_file' => [
                'required',
                'file',
                'mimes:csv,txt',
                'max:2048', // 2MB
            ],
        ];
    }

    public function messages()
    {
        return [
            'csv_file.required' => 'Debes seleccionar un archivo CSV.',
            'csv_file.file' => 'El archivo no es válido.',
            'csv_file.mimes' => 'El archivo debe ser de tipo CSV.',
            'csv_file.max' => 'El archivo no puede superar los 2MB.',
        ];
    }
}
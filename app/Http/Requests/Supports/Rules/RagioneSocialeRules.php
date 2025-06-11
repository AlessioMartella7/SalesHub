<?php

namespace App\Http\Requests\Supports\Rules;

class RagioneSocialeRules
{
    public static function rules(): array
    {
        return [
            'codice_esterno' => ['nullable', 'integer'],
            'azienda' => ['required', 'string', 'max:150', 'unique:ragioni_sociali,azienda'],
            'partita_iva' => ['required', 'string', 'max:16', 'unique:ragioni_sociali,partita_iva'],
            'codice_fiscale' => ['required', 'string', 'max:16'],
            'email' => ['nullable', 'email', 'max:100'],
            'tel' => ['nullable', 'string', 'max:100'],
        ];
    }
}

<?php

namespace App\Http\Requests\Supports\Rules;

class RagioneSocialeRules
{
    public static function rules(): array
    {
        return [
            'ragione_sociale.codice_esterno' => ['nullable', 'integer'],
            'ragione_sociale.azienda' => ['required', 'string', 'max:150'],
            'ragione_sociale.partita_iva' => ['required', 'string', 'max:16'],
            'ragione_sociale.codice_fiscale' => ['required', 'string', 'max:16'],
            'ragione_sociale.email' => ['nullable', 'email', 'max:100'],
            'ragione_sociale.tel' => ['nullable', 'string', 'max:100'],
        ];
    }
}

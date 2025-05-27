<?php

namespace App\Http\Requests\Supports\Rules;

class AddettoRules
{

    public static function rules(): array
    {
        return [
            'codice_esterno' => ['nullable', 'integer'],
            'ruolo' => ['nullable', 'string', 'max:50'],
            'nominativo' => ['required', 'string', 'max:100'],
            'nome' => ['nullable', 'string', 'max:100'],
            'cognome' => ['nullable', 'string', 'max:100'],
            'email' => ['nullable', 'email', 'max:100'],
            'numero_centralino' => ['nullable', 'string', 'max:10'],
        ];
    }
}

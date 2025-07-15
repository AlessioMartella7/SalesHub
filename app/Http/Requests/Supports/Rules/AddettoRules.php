<?php

namespace App\Http\Requests\Supports\Rules;

class AddettoRules
{

    public static function rules(): array
    {
        return [
            'addetto.codice_esterno' => ['nullable', 'integer'],
            'addetto.ruolo' => ['nullable', 'string', 'max:50'],
            'addetto.nominativo' => ['required', 'string', 'max:100'],
            'addetto.nome' => ['nullable', 'string', 'max:100'],
            'addetto.cognome' => ['nullable', 'string', 'max:100'],
            'addetto.email' => ['nullable', 'email', 'max:100'],
            'addetto.numero_centralino' => ['nullable', 'string', 'max:255'],
        ];
    }
}
<?php

namespace App\Http\Requests\Supports\Rules;

class AttivitaRules
{
    public static function rules(): array
    {
        return [
            'codice_esterno' => ['nullable', 'integer'],
            'nominativo' => ['required', 'string', 'max:100'],

            'codice_operatore_wind' => ['nullable', 'string', 'max:100'],
            'codice_operatore_vodafone' => ['nullable', 'string', 'max:100'],
            'codice_operatore_tim' => ['nullable', 'string', 'max:100'],
            'codice_operatore_fastweb' => ['nullable', 'string', 'max:100'],
            'codice_operatore_sky' => ['nullable', 'string', 'max:100'],

            'email' => ['nullable', 'string', 'max:100'],
            'tel' => ['nullable', 'string', 'max:100'],
            'indirizzo' => ['nullable', 'string', 'max:100'],
            'civico' => ['nullable', 'string', 'max:100'],
            'cap' => ['nullable', 'string', 'max:100'],
            'citta' => ['nullable', 'string', 'max:100'],
            'provincia' => ['nullable', 'string', 'max:100'],

        ];
    }
}
<?php

namespace App\Http\Requests\Supports\Rules;

class AttivitaRules
{
    public static function rules(): array
    {
        return [
            'attivita.codice_esterno' => ['nullable', 'integer'],
            'attivita.nominativo' => ['required', 'string', 'max:100'],

            'attivita.codice_operatore_wind' => ['nullable', 'string', 'max:100'],
            'attivita.codice_operatore_vodafone' => ['nullable', 'string', 'max:100'],
            'attivita.codice_operatore_tim' => ['nullable', 'string', 'max:100'],
            'attivita.codice_operatore_fastweb' => ['nullable', 'string', 'max:100'],
            'attivita.codice_operatore_sky' => ['nullable', 'string', 'max:100'],

            'attivita.email' => ['nullable', 'string', 'max:100'],
            'attivita.tel' => ['nullable', 'string', 'max:100'],
            'attivita.indirizzo' => ['nullable', 'string', 'max:100'],
            'attivita.civico' => ['nullable', 'string', 'max:100'],
            'attivita.cap' => ['nullable', 'string', 'max:100'],
            'attivita.citta' => ['nullable', 'string', 'max:100'],
            'attivita.provincia' => ['nullable', 'string', 'max:100'],

        ];
    }
}

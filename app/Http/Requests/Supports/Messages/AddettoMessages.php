<?php

namespace App\Http\Requests\Supports\Messages;

class AddettoMessages
{
    public static function messages(): array
    {
        return [
            'addetto.codice_esterno.integer' => 'Il codice esterno deve essere un numero intero.',

            'addetto.ruolo.string' => 'Il ruolo deve essere una stringa.',
            'addetto.ruolo.max' => 'Il ruolo non può superare :max caratteri.',

            'addetto.nominativo.required' => 'Il nominativo è obbligatorio.',
            'addetto.nominativo.string' => 'Il nominativo deve essere una stringa.',
            'addetto.nominativo.max' => 'Il nominativo non può superare :max caratteri.',

            'addetto.nome.string' => 'Il nome deve essere una stringa.',
            'addetto.nome.max' => 'Il nome non può superare :max caratteri.',

            'addetto.cognome.string' => 'Il cognome deve essere una stringa.',
            'addetto.cognome.max' => 'Il cognome non può superare :max caratteri.',

            'addetto.email.email' => "L'email deve essere un indirizzo email valido.",
            'addetto.email.max' => "L'email non può superare :max caratteri.",

            'addetto.numero_centralino.string' => 'Il numero centralino deve essere una stringa.',
            'addetto.numero_centralino.max' => 'Il numero centralino non può superare :max caratteri.',
        ];
    }
}

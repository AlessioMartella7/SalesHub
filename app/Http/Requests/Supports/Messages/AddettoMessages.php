<?php

namespace App\Http\Requests\Supports\Messages;

class AddettoMessages
{
    public static function messages():array
    {
          return [
            'codice_esterno.integer' => 'Il codice esterno deve essere un numero intero.',

            'ruolo.string' => 'Il ruolo deve essere una stringa.',
            'ruolo.max' => 'Il ruolo non può superare :max caratteri.',

            'nominativo.required' => 'Il nominativo è obbligatorio.',
            'nominativo.string' => 'Il nominativo deve essere una stringa.',
            'nominativo.max' => 'Il nominativo non può superare :max caratteri.',

            'nome.string' => 'Il nome deve essere una stringa.',
            'nome.max' => 'Il nome non può superare :max caratteri.',

            'cognome.string' => 'Il cognome deve essere una stringa.',
            'cognome.max' => 'Il cognome non può superare :max caratteri.',

            'email.email' => "L'email deve essere un indirizzo email valido.",
            'email.max' => "L'email non può superare :max caratteri.",

            'numero_centralino.string' => 'Il numero centralino deve essere una stringa.',
            'numero_centralino.max' => 'Il numero centralino non può superare :max caratteri.',
          ];
    }
}

<?php

namespace App\Http\Requests\Supports\Messages;

class OrganizzazioneMessages
{
    public static function messages(): array
    {
        return [
            'organizzazione.codice_esterno.integer' => 'Il codice esterno deve essere un numero intero.',
            'organizzazione.codice_esterno.unique' => 'Il codice esterno è già stato utilizzato.',

            'organizzazione.link.string' => 'Il link deve essere una stringa.',
            'organizzazione.link.max' => 'Il link non può superare i 50 caratteri.',

            'organizzazione.subdir.string' => 'La subdirectory deve essere una stringa.',
            'organizzazione.subdir.max' => 'La subdirectory non può superare i 50 caratteri.',
            'organizzazione.subdir.unique' => 'La subdirectory è già stata utilizzata.',
        ];
    }
}

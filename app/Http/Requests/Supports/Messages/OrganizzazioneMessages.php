<?php

namespace App\Http\Requests\Supports\Messages;

class OrganizzazioneMessages
{
    public static function messages(): array
    {
        return [
            'codice_esterno.integer' => 'Il codice esterno deve essere un numero intero.',
            'codice_esterno.unique' => 'Il codice esterno è già stato utilizzato.',

            'link.string' => 'Il link deve essere una stringa.',
            'link.max' => 'Il link non può superare i 50 caratteri.',

            'subdir.string' => 'La subdirectory deve essere una stringa.',
            'subdir.max' => 'La subdirectory non può superare i 50 caratteri.',
            'subdir.unique' => 'La subdirectory è già stata utilizzata.',
        ];
    }
}
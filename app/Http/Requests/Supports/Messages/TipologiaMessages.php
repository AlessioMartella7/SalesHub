<?php

namespace App\Http\Requests\Supports\Messages;

class TipologiaMessages
{
    public static function messages(): array
    {
        return [
            'tipologia.required' => 'Il campo tipologia è obbligatorio.',
            'tipologia.string' => 'Il campo tipologia deve essere una stringa.',
            'tipologia.max' => 'Il campo tipologia non può superare i 30 caratteri.',
        ];
    }
}

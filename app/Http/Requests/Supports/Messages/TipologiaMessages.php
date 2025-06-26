<?php

namespace App\Http\Requests\Supports\Messages;

class TipologiaMessages
{
    public static function messages(): array
    {
        return [
            'articoli.*.tipologia.tipologia.required' => 'Il campo tipologia è obbligatorio.',
            'articoli.*.tipologia.tipologia.string' => 'Il campo tipologia deve essere una stringa.',
            'articoli.*.tipologia.tipologia.max' => 'Il campo tipologia non può superare i 255 caratteri.',
        ];
    }
}

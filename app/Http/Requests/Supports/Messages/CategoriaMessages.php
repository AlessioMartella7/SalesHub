<?php

namespace App\Http\Requests\Supports\Messages;

class CategoriaMessages
{
    public static function messages(): array
    {
        return [
            'categoria.required' => 'Il campo categoria è obbligatorio.',
            'categoria.string' => 'Il campo categoria deve essere una stringa.',
            'categoria.max' => 'Il campo categoria non può superare i 30 caratteri.',

            'tipo.required' => 'Il campo tipo è obbligatorio.',
            'tipo.string' => 'Il campo tipo deve essere una stringa.',
            'tipo.max' => 'Il campo tipo non può superare 1 carattere.',
        ];
    }
}
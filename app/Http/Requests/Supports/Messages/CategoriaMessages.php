<?php

namespace App\Http\Requests\Supports\Messages;

class CategoriaMessages
{
    public static function messages(): array
    {
        return [
            'articoli.*.categoria.categoria.required' => 'Il campo categoria è obbligatorio.',
            'articoli.*.categoria.categoria.string' => 'Il campo categoria deve essere una stringa.',
            'articoli.*.categoria.categoria.max' => 'Il campo categoria non può superare i 255 caratteri.',
        ];
    }
}

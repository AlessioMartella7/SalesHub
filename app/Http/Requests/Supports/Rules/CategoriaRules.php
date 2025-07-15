<?php

namespace App\Http\Requests\Supports\Rules;

class CategoriaRules
{
    public static function rules(): array
    {
        return [
            'articoli.*.categoria.categoria' => ['required', 'string', 'max:255'],
        ];
    }
}
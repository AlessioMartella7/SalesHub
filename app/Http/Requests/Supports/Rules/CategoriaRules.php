<?php

namespace App\Http\Requests\Supports\Rules;

class CategoriaRules
{
    public static function rules(): array
    {
        return [
            'categoria' => ['required', 'string', 'max:30'],
            'tipo' => ['required', 'string', 'max:1'],
        ];
    }
}

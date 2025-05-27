<?php

namespace App\Http\Requests\Supports\Rules;

class TipologiaRules
{
    public static function rules(): array
    {
        return [
            'tipologia' => ['required', 'string', 'max:30']
        ];
    }
}

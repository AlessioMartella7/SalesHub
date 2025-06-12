<?php

namespace App\Http\Requests\Supports\Rules;

class OrganizzazioneRules
{
    public static function rules(): array
    {
        return [
            'organizzazione.codice_esterno' => ['nullable', 'integer'],
            'organizzazione.link' => ['nullable', 'string', 'max:50'],
            'organizzazione.subdir' => ['nullable', 'string', 'max:50'],
        ];
    }
}

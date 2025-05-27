<?php

namespace App\Http\Requests\Supports\Rules;

class OrganizzazioneRules
{
    public static function rules(): array
    {
        return [
            'codice_esterno' => ['nullable', 'integer', 'unique:organizzazioni,codice_esterno'],
            'link' => ['nullable', 'string', 'max:50'],
            'subdir' => ['nullable', 'string', 'max:50', 'unique:organizzazioni,subdir'],
        ];
    }
}
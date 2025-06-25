<?php

namespace App\Http\Requests\Supports\Rules;

class DettaglioDomandaRules
{
    public static function rules(): array
    {
        return [
            'articoli.*.dettaglio.domande.*.testo' => ['required', 'string'],
        ];
    }
}
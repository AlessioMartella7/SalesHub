<?php

namespace App\Http\Requests\Supports\Rules;

class DomandaRispostaRules
{
    public static function rules(): array
    {
        return [
            'articoli.*.dettaglio.domande.*.risposta' => ['nullable', 'string'],
        ];
    }
}

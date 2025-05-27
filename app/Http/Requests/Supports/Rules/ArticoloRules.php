<?php

namespace App\Http\Requests\Supports\Rules;

class ArticoloRules
{
    public static function rules(): array
    {
        return [
            'tipo' => ['string', 'max:1'],
            'codice' => ['string', 'max:50'],

            'codice_ean' => ['nullable', 'string', 'max:50'],
            'codice_univoco' => ['nullable', 'string', 'max:10'],

            'voce_scontrino' => ['nullable', 'string', 'max:50'],
            'descrizione' => ['nullable', 'string', 'max:150'],
            'marca' => ['nullable', 'string', 'max:70'],
            'modello' => ['nullable', 'string', 'max:150'],

            'brand_id' => ['nullable', 'string', 'max:1'],
            'costo_acquisto' => ['nullable', 'string', 'max:10'],
            'aliquota_acquisto' => ['nullable', 'string', 'max:10'],
        ];
    }
}
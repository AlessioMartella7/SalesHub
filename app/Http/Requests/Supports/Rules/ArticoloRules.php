<?php

namespace App\Http\Requests\Supports\Rules;

class ArticoloRules
{
    public static function rules(): array
    {
        return [
            'articoli.*.info.tipo' => ['string', 'max:1'],
            'articoli.*.info.codice' => ['string', 'max:50'],

            'articoli.*.info.codice_ean' => ['nullable', 'string', 'max:50'],
            'articoli.*.info.codice_univoco' => ['nullable', 'string'],

            'articoli.*.info.voce_scontrino' => ['nullable', 'string', 'max:50'],
            'articoli.*.info.descrizione' => ['nullable', 'string', 'max:150'],
            'articoli.*.info.marca' => ['nullable', 'string', 'max:70'],
            'articoli.*.info.modello' => ['nullable', 'string', 'max:150'],

            'articoli.*.info.brand_id' => ['nullable', 'string'],
            'articoli.*.info.costo_acquisto' => ['nullable', 'string', 'max:10'],
            'articoli.*.info.aliquota_acquisto' => ['nullable', 'string', 'max:10'],
        ];
    }
}

<?php

namespace App\Http\Requests\Supports\Rules;

class ArticoloDettaglioRules
{
    public static function rules()
    {
        return [
            'tipologia_vendita' => ['nullable', 'string', 'max:20'],
            'canone' => ['nullable', 'string', 'max:10'],

            'prezzo' => ['nullable', 'numeric', 'between:0,99999999999999999999.99'],
            'aliquota_prezzo' => ['nullable', 'numeric', 'between:0,99999999999999999999.99'],
            'natura' => ['nullable', 'string', 'max:10'],
            'importo_imponibile' => ['nullable', 'numeric', 'between:0,99999999999999999999.99'],

            'sconto' => ['nullable', 'numeric', 'between:0,99999999999999999999.99'],
            'sconto_iva_esclusa' => ['nullable', 'numeric', 'between:0,99999999999999999999.99'],

            'importo_anticipo' => ['nullable', 'numeric', 'between:0,99999999999999999999.99'],
            'importo_finanziato' => ['nullable', 'numeric', 'between:0,99999999999999999999.99'],
            'importo_credito' => ['nullable', 'numeric', 'between:0,99999999999999999999.99'],
            'importo_ndc' => ['nullable', 'numeric', 'between:0,99999999999999999999.99'],

            'importo_scontrino' => ['nullable', 'numeric', 'between:0,99999999999999999999.99'],

            'vendita_info1' => ['nullable', 'string', 'max:255'],
            'vendita_info2' => ['nullable', 'string', 'max:255'],
            'vendita_info3' => ['nullable', 'string', 'max:255'],
            'vendita_info4' => ['nullable', 'string', 'max:255'],
            'vendita_info5' => ['nullable', 'string', 'max:255'],
        ];
    }
}
<?php

namespace App\Http\Requests\Supports\Rules;

class ArticoloDettaglioRules
{
    public static function rules(): array
    {
        return [
            'articoli.*.dettaglio.tipologia_vendita' => ['nullable', 'string'],
            'articoli.*.dettaglio.canone' => ['nullable', 'string', 'max:10'],

            'articoli.*.dettaglio.prezzo' => ['nullable', 'numeric', 'between:-0.9,99999999999999999999.99'],
            'articoli.*.dettaglio.aliquota_prezzo' => ['nullable', 'numeric', 'between:-0.9,99999999999999999999.99'],
            'articoli.*.dettaglio.natura' => ['nullable', 'string', 'max:10'],
            'articoli.*.dettaglio.importo_imponibile' => ['nullable', 'numeric', 'between:-0.9,99999999999999999999.99'],

            'articoli.*.dettaglio.sconto' => ['nullable', 'numeric', 'between:-0.9,99999999999999999999.99'],
            'articoli.*.dettaglio.sconto_iva_esclusa' => ['nullable', 'numeric', 'between:-0.9,99999999999999999999.99'],

            'articoli.*.dettaglio.importo_anticipo' => ['nullable', 'numeric', 'between:-0.9,99999999999999999999.99'],
            'articoli.*.dettaglio.importo_finanziato' => ['nullable', 'numeric', 'between:-0.9,99999999999999999999.99'],
            'articoli.*.dettaglio.importo_credito' => ['nullable', 'numeric', 'between:-0.9,99999999999999999999.99'],
            'articoli.*.dettaglio.importo_ndc' => ['nullable', 'numeric'],

            'articoli.*.dettaglio.importo_scontrino' => ['nullable', 'numeric', 'between:-0.9,99999999999999999999.99'],

            'articoli.*.dettaglio.vendita_info1' => ['nullable', 'string', 'max:255'],
            'articoli.*.dettaglio.vendita_info2' => ['nullable', 'string', 'max:255'],
            'articoli.*.dettaglio.vendita_info3' => ['nullable', 'string', 'max:255'],
            'articoli.*.dettaglio.vendita_info4' => ['nullable', 'string', 'max:255'],
            'articoli.*.dettaglio.vendita_info5' => ['nullable', 'string', 'max:255'],
        ];
    }
}

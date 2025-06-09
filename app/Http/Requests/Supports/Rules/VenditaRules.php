<?php

namespace App\Http\Requests\Supports\Rules;

class VenditaRules
{
    public static function rules(): array
    {
        return [
            'vendita.info.codice_esterno' => ['nullable', 'integer'],
            'vendita.info.stato' => ['required', 'string', 'max:20'],
            'vendita.info.flg_scontrino' => ['required', 'string', 'max:1'],

            'vendita.info.numero_scontrino' => ['nullable', 'string', 'max:30'],
            'vendita.info.codice_lotteria' => ['nullable', 'string', 'max:30'],
            'vendita.info.data_scontrino' => ['nullable', 'date'],

            'vendita.info.data_vendita' => ['required', 'date'],
            'vendita.info.data_inizio' => ['required', 'date'],
            'vendita.info.data_fine' => ['required', 'date'],

            'vendita.info.totale' => ['required', 'numeric', 'between:0,99999999999999999999.99'],
            'vendita.info.totale_imponibile' => ['required', 'numeric', 'between:0,99999999999999999999.99'],
        ];
    }
}

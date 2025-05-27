<?php

namespace App\Http\Requests\Supports\Rules;

class VenditaRules
{
    public static function rules(): array
    {
        return [
            'codice_esterno' => ['nullable', 'integer'],
            'stato' => ['required', 'string', 'max:20'],
            'flg_scontrino' => ['required', 'string', 'max:1'],

            'numero_scontrino' => ['nullable', 'string', 'max:30'],
            'codice_lotteria' => ['nullable', 'string', 'max:30'],
            'data_scontrino' => ['nullable', 'date'],

            'data_vendita' => ['required', 'date'],
            'data_inizio' => ['required', 'date'],
            'data_fine' => ['required', 'date'],

            'totale' => ['required', 'numeric', 'between:0,99999999999999999999.99'],
            'totale_imponibile' => ['required', 'numeric', 'between:0,99999999999999999999.99'],
        ];
    }
}
<?php

namespace App\Http\Requests\Supports\Messages;

class VenditaMessages
{
    public static function messages(): array
    {
        return [
            'codice_esterno.integer' => 'Il campo codice esterno deve essere un numero intero.',

            'stato.required' => 'Il campo stato è obbligatorio.',
            'stato.string' => 'Il campo stato deve essere una stringa.',
            'stato.max' => 'Il campo stato non può superare 20 caratteri.',

            'flg_scontrino.required' => 'Il campo tipo scontrino è obbligatorio.',
            'flg_scontrino.string' => 'Il campo tipo scontrino deve essere una stringa.',
            'flg_scontrino.max' => 'Il campo tipo scontrino deve essere di 1 carattere.',

            'numero_scontrino.string' => 'Il numero scontrino deve essere una stringa.',
            'numero_scontrino.max' => 'Il numero scontrino non può superare 30 caratteri.',

            'codice_lotteria.string' => 'Il codice lotteria deve essere una stringa.',
            'codice_lotteria.max' => 'Il codice lotteria non può superare 30 caratteri.',

            'data_scontrino.date' => 'La data dello scontrino deve essere una data valida.',

            'data_vendita.required' => 'La data vendita è obbligatoria.',
            'data_vendita.date' => 'La data vendita deve essere una data valida.',

            'data_inizio.required' => 'La data inizio è obbligatoria.',
            'data_inizio.date' => 'La data inizio deve essere una data valida.',

            'data_fine.required' => 'La data fine è obbligatoria.',
            'data_fine.date' => 'La data fine deve essere una data valida.',

            'totale.required' => 'Il campo totale è obbligatorio.',
            'totale.numeric' => 'Il campo totale deve essere un numero.',
            'totale.between' => 'Il campo totale deve essere compreso tra 0 e 99999999999999999999.99.',

            'totale_imponibile.required' => 'Il campo totale imponibile è obbligatorio.',
            'totale_imponibile.numeric' => 'Il campo totale imponibile deve essere un numero.',
            'totale_imponibile.between' => 'Il campo totale imponibile deve essere compreso tra 0 e 99999999999999999999.99.'
        ];
    }
}
<?php

namespace App\Http\Requests\Supports\Messages;

class VenditaMessages
{
    public static function messages(): array
    {
        return [
            'vendita.codice_esterno.integer' => 'Il campo codice esterno deve essere un numero intero.',

            'vendita.vendita.stato.required' => 'Il campo stato è obbligatorio.',
            'vendita.stato.string' => 'Il campo stato deve essere una stringa.',
            'vendita.stato.max' => 'Il campo stato non può superare 20 caratteri.',

            'vendita.flg_scontrino.required' => 'Il campo tipo scontrino è obbligatorio.',
            'vendita.flg_scontrino.string' => 'Il campo tipo scontrino deve essere una stringa.',
            'vendita.flg_scontrino.max' => 'Il campo tipo scontrino deve essere di 1 carattere.',

            'vendita.numero_scontrino.string' => 'Il numero scontrino deve essere una stringa.',
            'vendita.numero_scontrino.max' => 'Il numero scontrino non può superare 30 caratteri.',

            'vendita.codice_lotteria.string' => 'Il codice lotteria deve essere una stringa.',
            'vendita.codice_lotteria.max' => 'Il codice lotteria non può superare 30 caratteri.',

            'vendita.data_scontrino.date' => 'La data dello scontrino deve essere una data valida.',

            'vendita.data_vendita.required' => 'La data vendita è obbligatoria.',
            'vendita.data_vendita.date' => 'La data vendita deve essere una data valida.',

            'vendita.data_inizio.required' => 'La data inizio è obbligatoria.',
            'vendita.data_inizio.date' => 'La data inizio deve essere una data valida.',

            'vendita.data_fine.required' => 'La data fine è obbligatoria.',
            'vendita.data_fine.date' => 'La data fine deve essere una data valida.',

            'vendita.totale.required' => 'Il campo totale è obbligatorio.',
            'vendita.totale.numeric' => 'Il campo totale deve essere un numero.',
            'vendita.totale.between' => 'Il campo totale deve essere compreso tra 0 e 99999999999999999999.99.',

            'vendita.totale_imponibile.required' => 'Il campo totale imponibile è obbligatorio.',
            'vendita.totale_imponibile.numeric' => 'Il campo totale imponibile deve essere un numero.',
            'vendita.totale_imponibile.between' => 'Il campo totale imponibile deve essere compreso tra 0 e 99999999999999999999.99.'
        ];
    }
}

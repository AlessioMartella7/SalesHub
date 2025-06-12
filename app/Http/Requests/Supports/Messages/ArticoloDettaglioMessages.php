<?php

namespace App\Http\Requests\Supports\Messages;

class ArticoloDettaglioMessages
{
    public static function messages(): array
    {
        return [
            'articoli.*.dettaglio.tipologia_vendita.string' => 'La tipologia vendita deve essere una stringa.',
            'articoli.*.dettaglio.tipologia_vendita.max' => 'La tipologia vendita non può superare :max caratteri.',

            'articoli.*.dettaglio.canone.string' => 'Il canone deve essere una stringa.',
            'articoli.*.dettaglio.canone.max' => 'Il canone non può superare :max caratteri.',

            'articoli.*.dettaglio.prezzo.numeric' => 'Il prezzo deve essere un numero valido.',
            'articoli.*.dettaglio.prezzo.between' => 'Il prezzo deve essere compreso tra :min e :max.',

            'articoli.*.dettaglio.aliquota_prezzo.numeric' => 'L\'aliquota prezzo deve essere un numero valido.',
            'articoli.*.dettaglio.aliquota_prezzo.between' => 'L\'aliquota prezzo deve essere compresa tra :min e :max.',

            'articoli.*.dettaglio.natura.string' => 'La natura deve essere una stringa.',
            'articoli.*.dettaglio.natura.max' => 'La natura non può superare :max caratteri.',

            'articoli.*.dettaglio.importo_imponibile.numeric' => 'L\'importo imponibile deve essere un numero valido.',
            'articoli.*.dettaglio.importo_imponibile.between' => 'L\'importo imponibile deve essere compreso tra :min e :max.',

            'articoli.*.dettaglio.sconto.numeric' => 'Lo sconto deve essere un numero valido.',
            'articoli.*.dettaglio.sconto.between' => 'Lo sconto deve essere compreso tra :min e :max.',

            'articoli.*.dettaglio.sconto_iva_esclusa.numeric' => 'Lo sconto IVA esclusa deve essere un numero valido.',
            'articoli.*.dettaglio.sconto_iva_esclusa.between' => 'Lo sconto IVA esclusa deve essere compreso tra :min e :max.',

            'articoli.*.dettaglio.importo_anticipo.numeric' => 'L\'importo anticipo deve essere un numero valido.',
            'articoli.*.dettaglio.importo_anticipo.between' => 'L\'importo anticipo deve essere compreso tra :min e :max.',

            'articoli.*.dettaglio.importo_finanziato.numeric' => 'L\'importo finanziato deve essere un numero valido.',
            'articoli.*.dettaglio.importo_finanziato.between' => 'L\'importo finanziato deve essere compreso tra :min e :max.',

            'articoli.*.dettaglio.importo_credito.numeric' => 'L\'importo credito deve essere un numero valido.',
            'articoli.*.dettaglio.importo_credito.between' => 'L\'importo credito deve essere compreso tra :min e :max.',

            'articoli.*.dettaglio.importo_ndc.numeric' => 'L\'importo NDC deve essere un numero valido.',
            'articoli.*.dettaglio.importo_ndc.between' => 'L\'importo NDC deve essere compreso tra :min e :max.',

            'articoli.*.dettaglio.importo_scontrino.numeric' => 'L\'importo scontrino deve essere un numero valido.',
            'articoli.*.dettaglio.importo_scontrino.between' => 'L\'importo scontrino deve essere compreso tra :min e :max.',

            'articoli.*.dettaglio.vendita_info1.string' => 'Il campo vendita info 1 deve essere una stringa.',
            'articoli.*.dettaglio.vendita_info1.max' => 'Il campo vendita info 1 non può superare :max caratteri.',

            'articoli.*.dettaglio.vendita_info2.string' => 'Il campo vendita info 2 deve essere una stringa.',
            'articoli.*.dettaglio.vendita_info2.max' => 'Il campo vendita info 2 non può superare :max caratteri.',

            'articoli.*.dettaglio.vendita_info3.string' => 'Il campo vendita info 3 deve essere una stringa.',
            'articoli.*.dettaglio.vendita_info3.max' => 'Il campo vendita info 3 non può superare :max caratteri.',

            'articoli.*.dettaglio.vendita_info4.string' => 'Il campo vendita info 4 deve essere una stringa.',
            'articoli.*.dettaglio.vendita_info4.max' => 'Il campo vendita info 4 non può superare :max caratteri.',

            'articoli.*.dettaglio.vendita_info5.string' => 'Il campo vendita info 5 deve essere una stringa.',
            'articoli.*.dettaglio.vendita_info5.max' => 'Il campo vendita info 5 non può superare :max caratteri.',
        ];
    }
}

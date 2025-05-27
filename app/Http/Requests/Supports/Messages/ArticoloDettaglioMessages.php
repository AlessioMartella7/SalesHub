<?php

namespace app\Http\Requests\Supports\Messages;

class ArticoloDettaglioMessages
{
    public static function messages()
    {
        return [
            'tipologia_vendita.string' => 'La tipologia vendita deve essere una stringa.',
            'tipologia_vendita.max' => 'La tipologia vendita non può superare :max caratteri.',

            'canone.string' => 'Il canone deve essere una stringa.',
            'canone.max' => 'Il canone non può superare :max caratteri.',

            'prezzo.numeric' => 'Il prezzo deve essere un numero valido.',
            'prezzo.between' => 'Il prezzo deve essere compreso tra :min e :max.',

            'aliquota_prezzo.numeric' => 'L\'aliquota prezzo deve essere un numero valido.',
            'aliquota_prezzo.between' => 'L\'aliquota prezzo deve essere compresa tra :min e :max.',

            'natura.string' => 'La natura deve essere una stringa.',
            'natura.max' => 'La natura non può superare :max caratteri.',

            'importo_imponibile.numeric' => 'L\'importo imponibile deve essere un numero valido.',
            'importo_imponibile.between' => 'L\'importo imponibile deve essere compreso tra :min e :max.',

            'sconto.numeric' => 'Lo sconto deve essere un numero valido.',
            'sconto.between' => 'Lo sconto deve essere compreso tra :min e :max.',

            'sconto_iva_esclusa.numeric' => 'Lo sconto IVA esclusa deve essere un numero valido.',
            'sconto_iva_esclusa.between' => 'Lo sconto IVA esclusa deve essere compreso tra :min e :max.',

            'importo_anticipo.numeric' => 'L\'importo anticipo deve essere un numero valido.',
            'importo_anticipo.between' => 'L\'importo anticipo deve essere compreso tra :min e :max.',

            'importo_finanziato.numeric' => 'L\'importo finanziato deve essere un numero valido.',
            'importo_finanziato.between' => 'L\'importo finanziato deve essere compreso tra :min e :max.',

            'importo_credito.numeric' => 'L\'importo credito deve essere un numero valido.',
            'importo_credito.between' => 'L\'importo credito deve essere compreso tra :min e :max.',

            'importo_ndc.numeric' => 'L\'importo NDC deve essere un numero valido.',
            'importo_ndc.between' => 'L\'importo NDC deve essere compreso tra :min e :max.',

            'importo_scontrino.numeric' => 'L\'importo scontrino deve essere un numero valido.',
            'importo_scontrino.between' => 'L\'importo scontrino deve essere compreso tra :min e :max.',

            'vendita_info1.string' => 'Il campo vendita info 1 deve essere una stringa.',
            'vendita_info1.max' => 'Il campo vendita info 1 non può superare :max caratteri.',

            'vendita_info2.string' => 'Il campo vendita info 2 deve essere una stringa.',
            'vendita_info2.max' => 'Il campo vendita info 2 non può superare :max caratteri.',

            'vendita_info3.string' => 'Il campo vendita info 3 deve essere una stringa.',
            'vendita_info3.max' => 'Il campo vendita info 3 non può superare :max caratteri.',

            'vendita_info4.string' => 'Il campo vendita info 4 deve essere una stringa.',
            'vendita_info4.max' => 'Il campo vendita info 4 non può superare :max caratteri.',

            'vendita_info5.string' => 'Il campo vendita info 5 deve essere una stringa.',
            'vendita_info5.max' => 'Il campo vendita info 5 non può superare :max caratteri.',
        ];
    }
}
<?php

namespace App\Http\Requests\Supports\Messages;

class ArticoloMessages
{
    public static function messages(): array
    {
        return [
            'tipo.required' => 'Il campo tipo è obbligatorio.',
            'tipo.string' => 'Il campo tipo deve essere una stringa.',
            'tipo.max' => 'Il campo tipo non può superare :max caratteri.',

            'codice.required' => 'Il campo codice è obbligatorio.',
            'codice.string' => 'Il campo codice deve essere una stringa.',
            'codice.max' => 'Il campo codice non può superare :max caratteri.',

            'codice_ean.string' => 'Il campo codice EAN deve essere una stringa.',
            'codice_ean.max' => 'Il campo codice EAN non può superare :max caratteri.',

            'codice_univoco.string' => 'Il campo codice univoco deve essere una stringa.',
            'codice_univoco.max' => 'Il campo codice univoco non può superare :max caratteri.',

            'voce_scontrino.string' => 'Il campo voce scontrino deve essere una stringa.',
            'voce_scontrino.max' => 'Il campo voce scontrino non può superare :max caratteri.',

            'descrizione.string' => 'Il campo descrizione deve essere una stringa.',
            'descrizione.max' => 'Il campo descrizione non può superare :max caratteri.',

            'marca.string' => 'Il campo marca deve essere una stringa.',
            'marca.max' => 'Il campo marca non può superare :max caratteri.',

            'modello.string' => 'Il campo modello deve essere una stringa.',
            'modello.max' => 'Il campo modello non può superare :max caratteri.',

            'brand_id.string' => 'Il campo brand ID deve essere una stringa.',
            'brand_id.max' => 'Il campo brand ID non può superare :max caratteri.',

            'costo_acquisto.string' => 'Il campo costo acquisto deve essere una stringa.',
            'costo_acquisto.max' => 'Il campo costo acquisto non può superare :max caratteri.',

            'aliquota_acquisto.string' => 'Il campo aliquota acquisto deve essere una stringa.',
            'aliquota_acquisto.max' => 'Il campo aliquota acquisto non può superare :max caratteri.',
        ];
    }
}

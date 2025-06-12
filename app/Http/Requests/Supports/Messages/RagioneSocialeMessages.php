<?php

namespace App\Http\Requests\Supports\Messages;

class RagioneSocialeMessages
{
    public static function messages(): array
    {
        return [
            'ragione_sociale.codice_esterno.integer' => 'Il codice esterno deve essere un numero intero.',

            'ragione_sociale.azienda.required' => 'Il campo azienda è obbligatorio.',
            'ragione_sociale.azienda.string' => 'Il campo azienda deve essere una stringa.',
            'ragione_sociale.azienda.max' => 'Il campo azienda non può superare i 150 caratteri.',

            'ragione_sociale.partita_iva.required' => 'Il campo partita IVA è obbligatorio.',
            'ragione_sociale.partita_iva.string' => 'Il campo partita IVA deve essere una stringa.',

            'ragione_sociale.codice_fiscale.required' => 'Il campo codice fiscale RS è obbligatorio.',
            'ragione_sociale.codice_fiscale.string' => 'Il campo codice fiscale RS deve essere una stringa.',

            'ragione_sociale.email.email' => 'Il campo email deve essere un indirizzo email valido.',
            'ragione_sociale.email.max' => 'Il campo email non può superare i 100 caratteri.',

            'ragione_sociale.tel.string' => 'Il campo telefono deve essere una stringa.',
            'ragione_sociale.tel.max' => 'Il campo telefono non può superare i 100 caratteri.',
        ];
    }
}

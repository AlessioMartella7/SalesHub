<?php

namespace App\Http\Requests\Supports\Messages;

class RagioneSocialeMessages
{
    public static function messages(): array
    {
        return [
            'codice_esterno.integer' => 'Il codice esterno deve essere un numero intero.',

            'azienda.required' => 'Il campo azienda è obbligatorio.',
            'azienda.string' => 'Il campo azienda deve essere una stringa.',
            'azienda.max' => 'Il campo azienda non può superare i 150 caratteri.',
            'azienda.unique' => 'L\'azienda inserita è già presente.',

            'partita_iva.required' => 'Il campo partita IVA è obbligatorio.',
            'partita_iva.string' => 'Il campo partita IVA deve essere una stringa.',
            'partita_iva.size' => 'Il campo partita IVA deve contenere esattamente 16 caratteri.',
            'partita_iva.unique' => 'La partita IVA inserita è già presente.',

            'codice_fiscale.required' => 'Il campo codice fiscale è obbligatorio.',
            'codice_fiscale.string' => 'Il campo codice fiscale deve essere una stringa.',
            'codice_fiscale.size' => 'Il campo codice fiscale deve contenere esattamente 16 caratteri.',

            'email.email' => 'Il campo email deve essere un indirizzo email valido.',
            'email.max' => 'Il campo email non può superare i 100 caratteri.',

            'tel.string' => 'Il campo telefono deve essere una stringa.',
            'tel.max' => 'Il campo telefono non può superare i 100 caratteri.',
        ];
    }
}

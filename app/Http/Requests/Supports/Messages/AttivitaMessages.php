<?php

namespace App\Http\Requests\Supports\Messages;

class AttivitaMessages
{
    public static function messages(): array
    {
        return [
            'codice_esterno.integer' => 'Il campo codice esterno deve essere un numero intero.',

            'nominativo.required' => 'Il campo nominativo è obbligatorio.',
            'nominativo.string' => 'Il campo nominativo deve essere una stringa.',
            'nominativo.max' => 'Il campo nominativo non può superare i 100 caratteri.',

            'codice_operatore_wind.string' => 'Il campo codice operatore Wind deve essere una stringa.',
            'codice_operatore_wind.max' => 'Il campo codice operatore Wind non può superare i 100 caratteri.',

            'codice_operatore_vodafone.string' => 'Il campo codice operatore Vodafone deve essere una stringa.',
            'codice_operatore_vodafone.max' => 'Il campo codice operatore Vodafone non può superare i 100 caratteri.',

            'codice_operatore_tim.string' => 'Il campo codice operatore TIM deve essere una stringa.',
            'codice_operatore_tim.max' => 'Il campo codice operatore TIM non può superare i 100 caratteri.',

            'codice_operatore_fastweb.string' => 'Il campo codice operatore Fastweb deve essere una stringa.',
            'codice_operatore_fastweb.max' => 'Il campo codice operatore Fastweb non può superare i 100 caratteri.',

            'codice_operatore_sky.string' => 'Il campo codice operatore Sky deve essere una stringa.',
            'codice_operatore_sky.max' => 'Il campo codice operatore Sky non può superare i 100 caratteri.',

            'email.string' => 'Il campo email deve essere una stringa.',
            'email.max' => 'Il campo email non può superare i 100 caratteri.',

            'tel.string' => 'Il campo telefono deve essere una stringa.',
            'tel.max' => 'Il campo telefono non può superare i 100 caratteri.',

            'indirizzo.string' => 'Il campo indirizzo deve essere una stringa.',
            'indirizzo.max' => 'Il campo indirizzo non può superare i 100 caratteri.',

            'civico.string' => 'Il campo civico deve essere una stringa.',
            'civico.max' => 'Il campo civico non può superare i 100 caratteri.',

            'cap.string' => 'Il campo CAP deve essere una stringa.',
            'cap.max' => 'Il campo CAP non può superare i 100 caratteri.',

            'citta.string' => 'Il campo città deve essere una stringa.',
            'citta.max' => 'Il campo città non può superare i 100 caratteri.',

            'provincia.string' => 'Il campo provincia deve essere una stringa.',
            'provincia.max' => 'Il campo provincia non può superare i 100 caratteri.',
        ];
    }
}

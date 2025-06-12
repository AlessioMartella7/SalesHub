<?php

namespace App\Http\Requests\Supports\Messages;

class AttivitaMessages
{
    public static function messages(): array
    {
        return [
            'attivita.codice_esterno.integer' => 'Il campo codice esterno deve essere un numero intero.',

            'attivita.nominativo.required' => 'Il campo nominativo è obbligatorio.',
            'attivita.nominativo.string' => 'Il campo nominativo deve essere una stringa.',
            'attivita.nominativo.max' => 'Il campo nominativo non può superare i 100 caratteri.',

            'attivita.codice_operatore_wind.string' => 'Il campo codice operatore Wind deve essere una stringa.',
            'attivita.codice_operatore_wind.max' => 'Il campo codice operatore Wind non può superare i 100 caratteri.',

            'attivita.codice_operatore_vodafone.string' => 'Il campo codice operatore Vodafone deve essere una stringa.',
            'attivita.codice_operatore_vodafone.max' => 'Il campo codice operatore Vodafone non può superare i 100 caratteri.',

            'attivita.codice_operatore_tim.string' => 'Il campo codice operatore TIM deve essere una stringa.',
            'attivita.codice_operatore_tim.max' => 'Il campo codice operatore TIM non può superare i 100 caratteri.',

            'attivita.codice_operatore_fastweb.string' => 'Il campo codice operatore Fastweb deve essere una stringa.',
            'attivita.codice_operatore_fastweb.max' => 'Il campo codice operatore Fastweb non può superare i 100 caratteri.',

            'attivita.codice_operatore_sky.string' => 'Il campo codice operatore Sky deve essere una stringa.',
            'attivita.codice_operatore_sky.max' => 'Il campo codice operatore Sky non può superare i 100 caratteri.',

            'attivita.email.string' => 'Il campo email deve essere una stringa.',
            'attivita.email.max' => 'Il campo email non può superare i 100 caratteri.',

            'attivita.tel.string' => 'Il campo telefono deve essere una stringa.',
            'attivita.tel.max' => 'Il campo telefono non può superare i 100 caratteri.',

            'attivita.indirizzo.string' => 'Il campo indirizzo deve essere una stringa.',
            'attivita.indirizzo.max' => 'Il campo indirizzo non può superare i 100 caratteri.',

            'attivita.civico.string' => 'Il campo civico deve essere una stringa.',
            'attivita.civico.max' => 'Il campo civico non può superare i 100 caratteri.',

            'attivita.cap.string' => 'Il campo CAP deve essere una stringa.',
            'attivita.cap.max' => 'Il campo CAP non può superare i 100 caratteri.',

            'attivita.citta.string' => 'Il campo città deve essere una stringa.',
            'attivita.citta.max' => 'Il campo città non può superare i 100 caratteri.',

            'attivita.provincia.string' => 'Il campo provincia deve essere una stringa.',
            'attivita.provincia.max' => 'Il campo provincia non può superare i 100 caratteri.',
        ];
    }
}

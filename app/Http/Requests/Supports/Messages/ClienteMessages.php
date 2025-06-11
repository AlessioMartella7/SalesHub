<?php

namespace App\Http\Requests\Supports\Messages;

class ClienteMessages
{
    public static function messages(): array
    {
        return [
            'codice_esterno.integer' => 'Il campo codice esterno deve essere un numero intero.',

            'cliente_tipo.required' => 'Il campo tipo cliente è obbligatorio.',
            'cliente_tipo.string' => 'Il campo tipo cliente deve essere una stringa.',
            'cliente_tipo.max' => 'Il campo tipo cliente non può superare 50 caratteri.',

            'nominativo.required' => 'Il campo nominativo cliente è obbligatorio.',
            'nominativo.string' => 'Il campo nominativo deve essere una stringa.',
            'nominativo.max' => 'Il campo nominativo non può superare 150 caratteri.',

            'nome.string' => 'Il campo nome deve essere una stringa.',
            'nome.max' => 'Il campo nome non può superare 100 caratteri.',

            'cognome.string' => 'Il campo cognome deve essere una stringa.',
            'cognome.max' => 'Il campo cognome non può superare 100 caratteri.',

            'email.required' => 'Il campo email è obbligatorio.',
            'email.string' => 'Il campo email deve essere una stringa.',
            'email.max' => 'Il campo email non può superare 100 caratteri.',
            'email.email' => 'Il campo email deve contenere un indirizzo email valido.',

            'codice_fiscale.string' => 'Il campo codice fiscale cliente deve essere una stringa.',
            'codice_fiscale.max' => 'Il campo codice fiscale non può superare 100 caratteri.',

            'piva.string' => 'Il campo partita IVA deve essere una stringa.',
            'piva.max' => 'Il campo partita IVA non può superare 100 caratteri.',

            'tel1.string' => 'Il campo telefono 1 deve essere una stringa.',
            'tel1.max' => 'Il campo telefono 1 non può superare 25 caratteri.',

            'tel2.string' => 'Il campo telefono 2 deve essere una stringa.',
            'tel2.max' => 'Il campo telefono 2 non può superare 25 caratteri.',

            'tel3.string' => 'Il campo telefono 3 deve essere una stringa.',
            'tel3.max' => 'Il campo telefono 3 non può superare 25 caratteri.',

            'tel4.string' => 'Il campo telefono 4 deve essere una stringa.',
            'tel4.max' => 'Il campo telefono 4 non può superare 25 caratteri.',

            'codice_cliente_wind.string' => 'Il campo codice cliente Wind deve essere una stringa.',
            'codice_cliente_wind.max' => 'Il campo codice cliente Wind non può superare 50 caratteri.',

            'codice_cliente_vodafone.string' => 'Il campo codice cliente Vodafone deve essere una stringa.',
            'codice_cliente_vodafone.max' => 'Il campo codice cliente Vodafone non può superare 50 caratteri.',

            'codice_cliente_tim.string' => 'Il campo codice cliente TIM deve essere una stringa.',
            'codice_cliente_tim.max' => 'Il campo codice cliente TIM non può superare 50 caratteri.',

            'codice_cliente_fastweb.string' => 'Il campo codice cliente Fastweb deve essere una stringa.',
            'codice_cliente_fastweb.max' => 'Il campo codice cliente Fastweb non può superare 50 caratteri.',

            'codice_cliente_sky.string' => 'Il campo codice cliente Sky deve essere una stringa.',
            'codice_cliente_sky.max' => 'Il campo codice cliente Sky non può superare 50 caratteri.',
        ];
    }
}
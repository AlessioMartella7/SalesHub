<?php

namespace App\Http\Requests\Supports\Rules;

class ClienteRules
{
    public static function rules(): array
    {
        return [
            'codice_esterno' => ['nullable', 'integer'],

            'cliente_tipo' => ['required', 'string', 'max:50'],
            'nominativo' => ['required', 'string', 'max:150'],

            'nome' => ['nullable', 'string', 'max:100'],
            'cognome' => ['nullable', 'string', 'max:100'],
            'email' => ['required', 'string', 'max:100'],
            'codice_fiscale' => ['nullable', 'string', 'max:100'],
            'piva' => ['nullable', 'string', 'max:100'],

            'tel1' => ['nullable', 'string', 'max:25'],
            'tel2' => ['nullable', 'string', 'max:25'],
            'tel3' => ['nullable', 'string', 'max:25'],
            'tel4' => ['nullable', 'string', 'max:25'],

            'codice_cliente_wind' => ['nullable', 'string', 'max:50'],
            'codice_cliente_vodafone' => ['nullable', 'string', 'max:50'],
            'codice_cliente_tim' => ['nullable', 'string', 'max:50'],
            'codice_cliente_fastweb' => ['nullable', 'string', 'max:50'],
            'codice_cliente_sky' => ['nullable', 'string', 'max:50'],
        ];
    }
}

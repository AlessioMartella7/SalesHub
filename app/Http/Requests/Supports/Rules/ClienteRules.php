<?php

namespace App\Http\Requests\Supports\Rules;

class ClienteRules
{
    public static function rules(): array
    {
        return [
            'cliente.codice_esterno' => ['nullable', 'integer'],

            'cliente.cliente_tipo' => ['nullable','string'],
            'cliente.nominativo' => ['nullable','string'],

            'cliente.nome' => ['nullable', 'string', 'max:100'],
            'cliente.cognome' => ['nullable', 'string', 'max:100'],
            'cliente.email' => ['nullable', 'string'],
            'cliente.codice_fiscale' => ['nullable', 'string', 'max:100'],
            'cliente.piva' => ['nullable', 'string', 'max:100'],

            'cliente.tel1' => ['nullable', 'string', 'max:25'],
            'cliente.tel2' => ['nullable', 'string', 'max:25'],
            'cliente.tel3' => ['nullable', 'string', 'max:25'],
            'cliente.tel4' => ['nullable', 'string', 'max:25'],

            'cliente.codice_cliente_wind' => ['nullable', 'string', 'max:50'],
            'cliente.codice_cliente_vodafone' => ['nullable', 'string', 'max:50'],
            'cliente.codice_cliente_tim' => ['nullable', 'string', 'max:50'],
            'cliente.codice_cliente_fastweb' => ['nullable', 'string', 'max:50'],
            'cliente.codice_cliente_sky' => ['nullable', 'string', 'max:50'],
        ];
    }
}

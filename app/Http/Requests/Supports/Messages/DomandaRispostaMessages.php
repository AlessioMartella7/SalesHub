<?php

namespace App\Http\Requests\Supports\Messages;

class DomandaRispostaMessages
{
    public static function messages() : array
    {
        return [
            'articoli.*.dettaglio.domande.*.risposta.string' => 'La risposta deve essere una stringa.'
        ];
    }
}

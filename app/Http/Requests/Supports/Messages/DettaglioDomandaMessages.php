<?php

namespace App\Http\Requests\Supports\Messages;

class DettaglioDomandaMessages
{
    public static function messages() : array
    {
        return [
            'articoli.*.dettaglio.domande.*.testo.required' => 'Il campo domanda è obbligatorio.',
            'articoli.*.dettaglio.domande.*.testo.string' => 'La domanda deve essere una stringa.',
        ];
    }
}

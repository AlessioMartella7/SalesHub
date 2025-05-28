<?php

namespace App\Http\Requests\Supports\Messages;

class PagamentoMessages
{
    public static function messages(): array
    {
        return [
            'contanti.numeric' => 'Il campo contanti deve essere un numero.',
            'contanti.min' => 'Il campo contanti deve essere almeno 0.',

            'pagamenti_elettronici.numeric' => 'Il campo pagamenti elettronici deve essere un numero.',
            'pagamenti_elettronici.min' => 'Il campo pagamenti elettronici deve essere almeno 0.',

            'bonifici.numeric' => 'Il campo bonifici deve essere un numero.',
            'bonifici.min' => 'Il campo bonifici deve essere almeno 0.',

            'assegni.numeric' => 'Il campo assegni deve essere un numero.',
            'assegni.min' => 'Il campo assegni deve essere almeno 0.',

            'buoni.numeric' => 'Il campo buoni deve essere un numero.',
            'buoni.min' => 'Il campo buoni deve essere almeno 0.',

            'coupon.numeric' => 'Il campo coupon deve essere un numero.',
            'coupon.min' => 'Il campo coupon deve essere almeno 0.',

            'altri_pagamenti.numeric' => 'Il campo altri pagamenti deve essere un numero.',
            'altri_pagamenti.min' => 'Il campo altri pagamenti deve essere almeno 0.',

            'non_scontrinato.numeric' => 'Il campo non scontrinato deve essere un numero.',
            'non_scontrinato.min' => 'Il campo non scontrinato deve essere almeno 0.',

            'non_scontrinato_pos.numeric' => 'Il campo non scontrinato POS deve essere un numero.',
            'non_scontrinato_pos.min' => 'Il campo non scontrinato POS deve essere almeno 0.',

            'non_riscosso.numeric' => 'Il campo non riscosso deve essere un numero.',
            'non_riscosso.min' => 'Il campo non riscosso deve essere almeno 0.',

            'importo_conto_operatore_contanti.required' => 'Il campo importo conto operatore contanti è obbligatorio.',
            'importo_conto_operatore_contanti.numeric' => 'Il campo importo conto operatore contanti deve essere un numero.',
            'importo_conto_operatore_contanti.min' => 'Il campo importo conto operatore contanti deve essere almeno 0.',

            'importo_conto_operatore_pos.required' => 'Il campo importo conto operatore POS è obbligatorio.',
            'importo_conto_operatore_pos.numeric' => 'Il campo importo conto operatore POS deve essere un numero.',
            'importo_conto_operatore_pos.min' => 'Il campo importo conto operatore POS deve essere almeno 0.',
        ];
    }
}

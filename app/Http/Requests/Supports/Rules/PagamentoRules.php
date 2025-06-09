<?php

namespace App\Http\Requests\Supports\Rules;

class PagamentoRules
{
    public static function rules(): array
    {
        return [
            'vendita.pagamento.contanti' => ['nullable', 'numeric', 'min:0'],
            'vendita.pagamento.pagamenti_elettronici' => ['nullable', 'numeric', 'min:0'],
            'vendita.pagamento.bonifici' => ['nullable', 'numeric', 'min:0'],
            'vendita.pagamento.assegni' => ['nullable', 'numeric', 'min:0'],
            'vendita.pagamento.buoni' => ['nullable', 'numeric', 'min:0'],
            'vendita.pagamento.coupon' => ['nullable', 'numeric', 'min:0'],
            'vendita.pagamento.altri_pagamenti' => ['nullable', 'numeric', 'min:0'],
            'vendita.pagamento.non_scontrinato' => ['nullable', 'numeric', 'min:0'],
            'vendita.pagamento.non_scontrinato_pos' => ['nullable', 'numeric', 'min:0'],
            'vendita.pagamento.non_riscosso' => ['nullable', 'numeric', 'min:0'],

            'vendita.pagamento.importo_conto_operatore_contanti' => ['required', 'numeric', 'min:0'],
            'vendita.pagamento.importo_conto_operatore_pos' => ['required', 'numeric', 'min:0'],
        ];
    }
}

<?php

namespace App\Http\Requests\Supports\Rules;

class PagamentoRules
{
    public static function rules(): array
    {
        return [
            'contanti' => ['nullable', 'numeric', 'min:0'],
            'pagamenti_elettronici' => ['nullable', 'numeric', 'min:0'],
            'bonifici' => ['nullable', 'numeric', 'min:0'],
            'assegni' => ['nullable', 'numeric', 'min:0'],
            'buoni' => ['nullable', 'numeric', 'min:0'],
            'coupon' => ['nullable', 'numeric', 'min:0'],
            'altri_pagamenti' => ['nullable', 'numeric', 'min:0'],
            'non_scontrinato' => ['nullable', 'numeric', 'min:0'],
            'non_scontrinato_pos' => ['nullable', 'numeric', 'min:0'],
            'non_riscosso' => ['nullable', 'numeric', 'min:0'],

            'importo_conto_operatore_contanti' => ['required', 'numeric', 'min:0'],
            'importo_conto_operatore_pos' => ['required', 'numeric', 'min:0'],
        ];
    }
}
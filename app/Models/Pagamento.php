<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pagamento extends Model
{
    /** @use HasFactory<\Database\Factories\PagamentoFactory> */
    use HasFactory;

    protected $table = 'pagamenti';

    protected $fillable = [
        'vendite_id',
        'contanti',
        'pagamenti_elettronici',
        'bonifici',
        'assegni',
        'buoni',
        'coupon',
        'altri_pagamenti',
        'non_scontrinato',
        'non_scontrinato_pos',
        'non_riscosso',
        'importo_conto_operatore_contanti',
        'importo_conto_operatore_pos',
    ];
}

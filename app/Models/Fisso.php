<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fisso extends Model
{
    use HasFactory;

    protected $table = 'fissi';

    protected $fillable = [
        'user_id',
        'codice_contratto',
        'stato',
        'market_segment',
        'codice_pdv',
        'dt_acquisizione',
        'dt_attivazione',
        'offerta',
        'flag_la_lna',
        'piano_tariffario_macro',
        'modalita_pagamento',
        'tipo_ko',
        'delay_giorni',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
};

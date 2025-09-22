<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OffertaAssicurazione extends Model
{
    protected $table = 'offerte_assicurazioni';

    protected $fillable = [
        'user_id',
        'codice_pdv',
        'codice_contratto',
        'id_carrello',
        'venditore',
        'stato_contratto',
        'attivato',
        'metodo_pagamento',
        'dt_inserimento',
        'dt_primo_pagamento',
        'dt_cancellazione',
        'categoria',
        'pacchetto',
        'esito_carrello',
        'causale_cancellazione'
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }
}

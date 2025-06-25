<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Risposta extends Model
{
    protected $table = 'articoli_dettagli_domande_risposte';

    protected $fillable = [
        'domanda_id',
        'articolo_dettaglio_id',
        'risposta'
    ];

    public function domanda(): BelongsTo
    {
        return $this->belongsTo(Domanda::class);
    }

    public function articoloDettaglio(): BelongsTo
    {
        return $this->belongsTo(ArticoloDettaglio::class);
    }
}

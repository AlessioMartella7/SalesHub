<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ArticoloDettaglio extends Model
{
    /** @use HasFactory<\Database\Factories\ArticoloDettaglioFactory> */
    use HasFactory;

    protected $table = 'articoli_dettagli';

    protected $fillable = [
        'articolo_id',
        'tipologia_vendita',
        'canone',
        'prezzo',
        'aliquota_prezzo',
        'natura',
        'importo_imponibile',
        'sconto',
        'sconto_iva_esclusa',
        'importo_anticipo',
        'importo_finanziato',
        'importo_credito',
        'importo_ndc',
        'importo_scontrino',
        'vendita_info1',
        'vendita_info2',
        'vendita_info3',
        'vendita_info4',
        'vendita_info5',
    ];

    public function articolo(): BelongsTo
    {
        return $this->belongsTo(Articolo::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Articolo extends Model
{
    /** @use HasFactory<\Database\Factories\ArticoloFactory> */
    use HasFactory;

    protected $table = 'articoli';

    protected $fillable = [
        'vendita_id',
        'categoria_id',
        'tipologia_id',
        'tipo',
        'codice',
        'codice_ean',
        'codice_univoco',
        'voce_scontrino',
        'descrizione',
        'marca',
        'modello',
        'brand_id',
        'costo_acquisto',
        'aliquota_acquisto',
    ];

    public function vendita(): BelongsTo
    {
        return $this->belongsTo(Vendita::class);
    }

    public function categoria(): BelongsTo
    {
        return $this->belongsTo(Categoria::class);
    }

    public function tipologia(): BelongsTo
    {
        return $this->belongsTo(Tipologia::class);
    }

    public function articoloDettaglio(): HasOne
    {
        return $this->hasOne(ArticoloDettaglio::class);
    }
}

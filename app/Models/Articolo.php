<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Articolo extends Model
{
    /** @use HasFactory<\Database\Factories\ArticoloFactory> */
    use HasFactory;

    protected $table = 'articoli';

    protected $fillable = [
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

    public function vendite(): BelongsToMany
    {
        return $this->belongsToMany(Vendita::class)->withPivot('canone');
    }

    public function articoliDettagli(): HasMany
    {
        return $this->hasMany(ArticoloDettaglio::class);
    }

    public function categoria(): BelongsTo
    {
        return $this->belongsTo(Categoria::class);
    }
}

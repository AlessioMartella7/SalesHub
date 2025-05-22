<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Tipologia extends Model
{
    /** @use HasFactory<\Database\Factories\TipologiaFactory> */
    use HasFactory;

    protected $table = 'tipologie';

    protected $fillable = [
        'categoria_id',
        'tipologia'
    ];

    public function categoria(): BelongsTo
    {
        return $this->belongsTo(Categoria::class);
    }

    public function articoli(): HasMany
    {
        return $this->hasMany(Articolo::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Vendita extends Model
{
    /** @use HasFactory<\Database\Factories\VenditaFactory> */
    use HasFactory;

    protected $table = 'vendite';

    protected $fillable = [
        'attivita_id',
        'cliente_id',
        'addetto_id',
        'codice_esterno',
        'stato',
        'flg_scontrino',
        'numero_scontrino',
        'codice_lotteria',
        'data_scontrino',
        'data_vendita',
        'data_inizio',
        'data_fine',
        'totale',
        'totale_imponibile',
    ];

    public function organizzazione(): BelongsTo
    {
        return $this->belongsTo(Organizzazione::class);
    }

    public function attivita(): BelongsTo
    {
        return $this->belongsTo(Attivita::class);
    }

    public function addetto(): BelongsTo
    {
        return $this->belongsTo(Addetto::class);
    }

    public function cliente(): BelongsTo
    {
        return $this->belongsTo(Cliente::class);
    }

    public function articoli(): HasMany
    {
        return $this->hasMany(Articolo::class);
    }

    public function pagamento(): HasOne
    {
        return $this->hasOne(Pagamento::class);
    }
}
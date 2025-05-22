<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Attivita extends Model
{
    /** @use HasFactory<\Database\Factories\AttivitaFactory> */
    use HasFactory;

    protected $table = 'attivita';

    protected $fillable = [
        'ragione_sociale_id',
        'codice_esterno',
        'nominativo',
        'codice_operatore_wind',
        'codice_operatore_vodafone',
        'codice_operatore_tim',
        'codice_operatore_fastweb',
        'codice_operatore_sky',
        'email',
        'tel',
        'indirizzo',
        'civico',
        'cap',
        'citta',
        'provincia',
    ];

    public function ragioneSociale(): BelongsTo
    {
        return $this->belongsTo(RagioneSociale::class);
    }
}

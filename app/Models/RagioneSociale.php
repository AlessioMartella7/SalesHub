<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class RagioneSociale extends Model
{
    /** @use HasFactory<\Database\Factories\RagioneSocialeFactory> */
    use HasFactory;

    protected $table = 'ragioni_sociali';

    protected $fillable = [
        'organizzazione_id',
        'codice_esterno',
        'azienda',
        'partita_iva',
        'codice_fiscale',
        'email',
        'tel',
    ];

    public function organizzazione(): BelongsTo
    {
        return $this->belongsTo(Organizzazione::class);
    }
}

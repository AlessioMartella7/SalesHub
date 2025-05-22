<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Cliente extends Model
{
    /** @use HasFactory<\Database\Factories\ClienteFactory> */
    use HasFactory;

    protected $table = 'clienti';

    protected $fillable = [
        'codice_esterno',
        'cliente_tipo',
        'nominativo',
        'nome',
        'cognome',
        'email',
        'codice_fiscale',
        'piva',
        'tel1',
        'tel2',
        'tel3',
        'tel4',
        'codice_cliente_wind',
        'codice_cliente_vodafone',
        'codice_cliente_tim',
        'codice_cliente_fastweb',
        'codice_cliente_sky',
    ];

    public function vendite(): HasMany
    {
        return $this->hasMany(Vendita::class);
    }
}

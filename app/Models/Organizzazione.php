<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Organizzazione extends Model
{
    /** @use HasFactory<\Database\Factories\OrganizzazioneFactory> */
    use HasFactory;

    protected $table = 'organizzazioni';

    protected $fillable = [
        'codice_esterno',
        'link',
        'subdir'
    ];

    public function ragioniSociali(): HasMany
    {
        return $this->hasMany(RagioneSociale::class);
    }
}

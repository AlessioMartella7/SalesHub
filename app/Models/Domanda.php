<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Domanda extends Model
{
    protected $table = 'articoli_dettagli_domande';

    protected $fillable = ['testo'];

    public function risposte() : HasMany
    {
        return $this->hasMany(Risposta::class);
    }
}
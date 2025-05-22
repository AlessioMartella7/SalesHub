<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Addetto extends Model
{
    /** @use HasFactory<\Database\Factories\AddettoFactory> */
    use HasFactory;

    protected $table = 'addetti';

    protected $fillable = [
        'codice_esterno',
        'ruolo',
        'nominativo',
        'nome',
        'cognome',
        'email',
        'numero_centralino',
    ];
}

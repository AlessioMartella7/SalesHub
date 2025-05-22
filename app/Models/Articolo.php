<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
}

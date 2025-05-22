<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ArticoloDettaglio extends Model
{
    /** @use HasFactory<\Database\Factories\ArticoloDettaglioFactory> */
    use HasFactory;

    protected $table = 'articoli_dettagli';
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Categoria extends Model
{
    /** @use HasFactory<\Database\Factories\CategoriaFactory> */
    use HasFactory;

    protected $table = 'categorie';

    protected $fillable = [
        'categoria',
        'tipo'
    ];

    public function articoli(): HasMany
    {
        return $this->hasMany(Articolo::class);
    }
}

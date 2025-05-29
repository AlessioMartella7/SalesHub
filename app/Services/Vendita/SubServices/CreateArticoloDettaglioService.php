<?php

namespace App\Services\Vendita\SubServices;

use App\Models\ArticoloDettaglio;
use App\Models\Articolo;

class CreateArticoloDettaglioService
{
    public function createMany(array $dettagli, Articolo $articolo): void
    {
        foreach ($dettagli as $dettaglio) {
            $articolo->articoliDettagli()->create($dettaglio);
        }
    }
}

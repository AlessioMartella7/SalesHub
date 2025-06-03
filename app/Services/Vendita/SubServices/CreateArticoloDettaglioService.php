<?php

namespace App\Services\Vendita\SubServices;

use App\Models\ArticoloDettaglio;
use App\Models\Articolo;

class CreateArticoloDettaglioService
{
    public function createMany(Articolo $articolo, array $dettagli): void
    {
        foreach ($dettagli as $dettaglio) {
            $articolo->articoliDettagli()->create($dettaglio);
        }
    }
}
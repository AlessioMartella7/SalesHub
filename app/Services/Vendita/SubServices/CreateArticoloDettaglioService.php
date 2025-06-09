<?php

namespace App\Services\Vendita\SubServices;

use App\Models\ArticoloDettaglio;
use App\Models\Articolo;

class CreateArticoloDettaglioService
{
    public function create(Articolo $articolo, array $dettaglio): ArticoloDettaglio
    {
        return $articolo->articoloDettaglio()->create($dettaglio);
    }
}

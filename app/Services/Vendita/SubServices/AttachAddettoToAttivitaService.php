<?php

namespace App\Services\Vendita\SubServices;

use App\Models\Addetto;
use App\Models\Attivita;

class AttachAddettoToAttivitaService
{
    public function attach(Addetto $addetto, Attivita $attivita): void
    {
        $attivita->addetti()->syncWithoutDetaching([$addetto->id]);
    }
}

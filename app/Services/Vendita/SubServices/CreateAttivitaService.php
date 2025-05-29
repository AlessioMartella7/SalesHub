<?php

namespace App\Services\Vendita\SubServices;

use App\Models\Attivita;
use App\Models\RagioneSociale;

class CreateAttivitaService
{
    public function store(array $data, RagioneSociale $ragioneSociale): Attivita
    {
        return Attivita::firstOrCreate(
            ['codice_esterno' => $data['codice_esterno']],
            array_merge($data, ['ragione_sociale_id' => $ragioneSociale->id])
        );
    }
}

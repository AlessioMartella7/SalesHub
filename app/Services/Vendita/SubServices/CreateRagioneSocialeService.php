<?php

namespace App\Services\Vendita\SubServices;

use App\Models\Organizzazione;
use App\Models\RagioneSociale;

class CreateRagioneSocialeService
{
    public function create(array $data, Organizzazione $organizzazione): RagioneSociale
    {
        return RagioneSociale::firstOrCreate(
            ['codice_esterno' => $data['codice_esterno']],
            array_merge($data, ['organizzazione_id' => $organizzazione->id])
        );
    }
}

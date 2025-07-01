<?php

namespace App\Services\Vendita\SubServices;

use App\Models\Vendita;
use App\Models\Cliente;
use App\Models\Addetto;
use App\Models\Attivita;
use App\Models\Organizzazione;

class CreateVenditaEntityService
{
    public function create(array $data, Cliente $cliente, Addetto $addetto, Attivita $attivita, Organizzazione $organizzazione): Vendita
    {
        return Vendita::create(array_merge($data, [
            'cliente_id' => $cliente->id,
            'addetto_id' => $addetto->id,
            'attivita_id' => $attivita->id,
            'organizzazione_id' => $organizzazione->id
        ]));
    }
}
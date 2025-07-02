<?php

namespace App\Services\Vendita\SubServices;

use App\Models\Organizzazione;

class CreateOrganizzazioneService
{
    public function create(array $data): Organizzazione
    {
        return Organizzazione::firstOrCreate(
            [
                'codice_esterno' => $data['codice_esterno'],
                'subdir' => $data['subdir'],
            ],
            [
                'link' => $data['link'],
            ]
        );
    }
}

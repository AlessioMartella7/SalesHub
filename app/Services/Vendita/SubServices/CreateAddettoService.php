<?php

namespace App\Services\Vendita\SubServices;

use App\Models\Addetto;

class CreateAddettoService
{
    public function create(array $data): Addetto
    {
        return Addetto::firstOrCreate(
            ['codice_esterno' => $data['codice_esterno']],
            $data
        );
    }
}

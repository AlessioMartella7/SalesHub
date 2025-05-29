<?php

namespace App\Services\Vendita\SubServices;

use App\Models\Cliente;

class CreateClienteService
{
    public function create(array $data): Cliente
    {
        return Cliente::firstOrCreate(
            ['codice_esterno' => $data['codice_esterno']],
            $data
        );
    }
}

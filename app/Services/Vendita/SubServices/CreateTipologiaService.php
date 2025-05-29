<?php

namespace App\Services\Vendita\SubServices;

use App\Models\Tipologia;
use App\Models\Categoria;

class CreateTipologiaService
{
    public function create(array $data, Categoria $categoria): Tipologia
    {
        return Tipologia::firstOrCreate(
            ['tipologia' => $data['tipologia'], 'categoria_id' => $categoria->id],
            array_merge($data, ['categoria_id' => $categoria->id])
        );
    }
}

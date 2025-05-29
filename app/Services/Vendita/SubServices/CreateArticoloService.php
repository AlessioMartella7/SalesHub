<?php

namespace App\Services\Vendita\SubServices;

use App\Models\Articolo;
use App\Models\Categoria;
use App\Models\Tipologia;

class CreateArticoloService
{
    public function create(array $data, Categoria $categoria, Tipologia $tipologia): Articolo
    {
        return Articolo::create(
            array_merge($data, [
                'categoria_id' => $categoria->id,
                'tipologia_id' => $tipologia->id,
            ])
        );
    }
}

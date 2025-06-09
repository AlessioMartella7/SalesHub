<?php

namespace App\Services\Vendita\SubServices;

use App\Models\Articolo;
use App\Models\Categoria;
use App\Models\Tipologia;
use App\Models\Vendita;

class CreateArticoloService
{
    public function create(array $data, Categoria $categoria, Tipologia $tipologia, Vendita $vendita): Articolo
    {
        return Articolo::create(
            array_merge($data, [
                'categoria_id' => $categoria->id,
                'tipologia_id' => $tipologia->id,
                'vendita_id' => $vendita->id,
            ])
        );
    }
}

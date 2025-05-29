<?php

namespace App\Services\Vendita\SubServices;

use App\Models\Categoria;

class CreateCategoriaService
{
    public function create(array $data): Categoria
    {
        return Categoria::firstOrCreate(
            ['categoria' => $data['categoria']],
            $data
        );
    }
}

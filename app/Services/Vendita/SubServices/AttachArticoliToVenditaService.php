<?php

namespace App\Services\Vendita\SubServices;

use App\Models\Vendita;

class AttachArticoliToVenditaService
{
    public function attach(Vendita $vendita, array $articoli): void
    {
        foreach ($articoli as $item) {
            $vendita->articoli()->attach($item['id_articolo'], [
                'canone' => $item['canone'] ?? null
            ]);
        }
    }
}

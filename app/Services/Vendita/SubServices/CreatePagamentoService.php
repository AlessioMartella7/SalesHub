<?php

namespace App\Services\Vendita\SubServices;

use App\Models\Vendita;
use App\Models\Pagamento;

class CreatePagamentoService
{
    public function createMany(Vendita $vendita, array $pagamenti): void
    {
       foreach($pagamenti as $datiPagamento) {
        $vendita->pagamenti()->create($datiPagamento);
       }
    }
}

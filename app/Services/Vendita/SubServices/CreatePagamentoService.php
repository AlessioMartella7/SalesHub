<?php

namespace App\Services\Vendita\SubServices;

use App\Models\Vendita;
use App\Models\Pagamento;

class CreatePagamentoService
{
    public function createMany(array $pagamenti, Vendita $vendita): void
    {
       foreach($pagamenti as $datiPagamento) {
        $vendita->pagamenti()->create($datiPagamento);
       }
    }
}
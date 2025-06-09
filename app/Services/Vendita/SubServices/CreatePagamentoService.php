<?php

namespace App\Services\Vendita\SubServices;

use App\Models\Vendita;
use App\Models\Pagamento;

class CreatePagamentoService
{
    public function create(Vendita $vendita, array $pagamento): Pagamento
    {
        return $vendita->pagamento()->create($pagamento);
    }
}

<?php

namespace App\Services\Vendita;

use App\Models\Vendita;
use Illuminate\Support\Facades\DB;

// import dei sub services

use App\Services\Vendita\SubServices\CreateOrganizzazioneService;
use App\Services\Vendita\SubServices\CreateRagioneSocialeService;
use App\Services\Vendita\SubServices\CreateAttivitaService;
use App\Services\Vendita\SubServices\CreateAddettoService;
use App\Services\Vendita\SubServices\AttachAddettoToAttivitaService;
use App\Services\Vendita\SubServices\CreateClienteService;
use App\Services\Vendita\SubServices\CreateCategoriaService;
use App\Services\Vendita\SubServices\CreateTipologiaService;
use App\Services\Vendita\SubServices\CreateArticoloService;
use App\Services\Vendita\SubServices\CreateArticoloDettaglioService;
use App\Services\Vendita\SubServices\CreateVenditaEntityService;
use App\Services\Vendita\SubServices\AttachArticoliToVenditaService;
use App\Services\Vendita\SubServices\CreatePagamentoService;

class CreateVenditaService
{

    public function __construct(
        protected CreateOrganizzazioneService $organizzazioneService,
        protected CreateRagioneSocialeService $ragioneSocialeService,
        protected CreateAttivitaService $attivitaService,
        protected CreateAddettoService $addettoService,
        protected AttachAddettoToAttivitaService $addettoAttivitaService,
        protected CreateClienteService $clienteService,
        protected CreateCategoriaService $categoriaService,
        protected CreateTipologiaService $tipologiaService,
        protected CreateArticoloService $articoloService,
        protected CreateArticoloDettaglioService $articoloDettaglioService,
        protected CreateVenditaEntityService $venditaEntityService,
        protected AttachArticoliToVenditaService $attachArticoliService,
        protected CreatePagamentoService $pagamentoService,
    ) {}

    public function handle(array $data): Vendita {}
}

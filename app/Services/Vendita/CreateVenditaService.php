<?php

namespace App\Services\Vendita;

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

class CreateVenditaService {}

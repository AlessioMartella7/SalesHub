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
        protected CreatePagamentoService $pagamentoService
    ) {}

    public function handle(array $data): Vendita {
        return DB::transaction(function() use($data){
            //Creo Organizzazione + RagioneSociale + attività
            $organizzazione = $this->organizzazioneService->create($data['organizzazione']);
            $ragioneSociale = $this->ragioneSocialeService->create($data['ragione_sociale'], $organizzazione);
            $attivita = $this->attivitaService->create($data['attivita'], $ragioneSociale);

            //Creo Addetto
            $addetto = $this->addettoService->create($data['addetto']);

            //Collego l'addetto al punto vendita
            $this->addettoAttivitaService->attach($addetto, $attivita);

            //Creo Cliente
            $cliente = $this->clienteService->create($data['cliente']);

            //Creo gli articoli
            $articoli = [];

            //Creo Categoria + Tipologia
            foreach($data['articoli'] as $item){
                $categoria = $this->categoriaService->create($item['categoria']);
                $tipologia = $this->tipologiaService->create($item['tipologia'], $categoria);

                //Articoli + Dettagli
                $articolo = $this->articoloService->create($item['info'], $categoria, $tipologia);
                $this->articoloDettaglioService->createMany($articolo, $item['dettagli'] ?? []);

                $articoli [] = $articolo;
            }

            //Creo Vendita

            $vendita = $this->venditaEntityService->create($data['vendita']['info'], $cliente, $addetto, $attivita);

            //Collego gli articoli alla vendita
            $this->attachArticoliService->attach($vendita, $data['vendita']['articoli']);

            //Creo Pagamento

            $this->pagamentoService->createMany($vendita, $data['vendita']['pagamenti']);

            return $vendita;

        }, 5);

    }
}
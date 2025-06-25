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
        protected CreatePagamentoService $pagamentoService
    ) {}

    public function handle(array $data): Vendita
    {
        return DB::transaction(function () use ($data) {
            // Creo Organizzazione + RagioneSociale + Attività
            $organizzazione = $this->organizzazioneService->create($data['organizzazione']);
            $ragioneSociale = $this->ragioneSocialeService->create($data['ragione_sociale'], $organizzazione);
            $attivita = $this->attivitaService->create($data['attivita'], $ragioneSociale);

            // Creo Addetto
            $addetto = $this->addettoService->create($data['addetto']);
            $this->addettoAttivitaService->attach($addetto, $attivita);

            // Creo Cliente
            $cliente = $this->clienteService->create($data['cliente']);

            // Creo Vendita
            $vendita = $this->venditaEntityService->create($data['vendita']['info'], $cliente, $addetto, $attivita);

            // Creo gli articoli e i dettagli, collegandoli direttamente alla vendita
            foreach ($data['articoli'] as $item) {
                $categoria = $this->categoriaService->create($item['categoria'] ?? []);
                $tipologia = $this->tipologiaService->create($item['tipologia'] ?? [], $categoria);

                // Passa la vendita o vendita_id al service
                $articolo = $this->articoloService->create($item['info'], $categoria, $tipologia, $vendita);

                // Crea dettaglio articolo (one-to-one)
                $dettaglio = $this->articoloDettaglioService->create($articolo, $item['dettaglio'] ?? []);

                // Salva domande e risposte se presenti
                if (!empty($item['dettaglio']['domande'])) {
                    $this->domandaRispostaService->create($dettaglio, $item['dettaglio']['domande']);
                }
            }

            // Creo Pagamento (one-to-one)
            $this->pagamentoService->create($vendita, $data['vendita']['pagamento'] ?? []);

            return $vendita;
        }, 5);
    }
}
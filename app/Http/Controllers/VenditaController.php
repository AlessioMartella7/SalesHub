<?php

namespace App\Http\Controllers;

use App\Models\Vendita;
use App\Http\Requests\StoreVenditaRequest;
use App\Http\Requests\UpdateVenditaRequest;
use Illuminate\Http\JsonResponse;
use App\Services\Vendita\CreateVenditaService;
use Illuminate\Database\QueryException;

class VenditaController extends Controller
{
    public function __construct(
        protected CreateVenditaService $createVenditaService
    ) {}
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $query = Vendita::with([
            'cliente',
            'addetto',
            'attivita',
            'ragioneSociale',
            'organizzazione',
            'articoli',
            'articoli.articoloDettaglio.risposte.domanda',
            'pagamento',
        ]);

        if ($codice = request('codice_esterno')) {
            $query->where('codice_esterno', 'like', "%$codice%");
        }
        if ($cliente = request('cliente')) {
            $query->whereHas('cliente', function ($q) use ($cliente) {
                $q->where('codice_esterno', $cliente);
            });
        }
        if ($addetto = request('addetto')) {
            $query->whereHas('addetto', function ($q) use ($addetto) {
                $q->where('codice_esterno', $addetto);
            });
        }
        if ($flgScontrino = request('flg_scontrino')) {
            $query->where('flg_scontrino', 'like', "%$flgScontrino%");
        }
        if ($numeroScontrino = request('numero_scontrino')) {
            $query->where('numero_scontrino', 'like', "%$numeroScontrino%");
        }
        if ($dataScontrino = request('data_scontrino')) {
            $query->whereDate('data_scontrino', $dataScontrino);
        }
        if ($dataVendita = request('data_vendita')) {
            $query->whereDate('data_vendita', $dataVendita);
        }
        if ($from = request('dt_from')) {
            $query->whereDate('data_vendita', '>=', $from);
        }
        if ($to = request('dt_to')) {
            $query->whereDate('data_vendita', '<=', $to);
        }
        if ($attivita = request('attivita')) {
            $query->whereHas('attivita', function ($q) use ($attivita) {
                $q->where('nominativo', 'like', "%$attivita%");
            });
        }
        if ($ragioneSociale = request('ragione_sociale')) {
            $query->whereHas('ragioneSociale', function ($q) use ($ragioneSociale) {
                $q->where('azienda', 'like', "%$ragioneSociale%");
            });
        }
        if ($organizzazione = request('organizzazione')) {
            $query->whereHas('organizzazione', function ($q) use ($organizzazione) {
                $q->where('subdir', 'like', "%$organizzazione%");
            });
        }

        $vendite = $query->orderByDesc('data_vendita')->paginate(50);

        return view('pages.vendite.index', compact('vendite'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreVenditaRequest $request): JsonResponse
    {
        try {

            $validatedRequest = $request->validated();
            // Validazione passata → salvataggio atomico tramite service
            $vendita = $this->createVenditaService->handle($validatedRequest);
            return response()->json([
                'message' => 'Vendita creata con successo.',
                'data' => $vendita->load([
                    'cliente',
                    'addetto',
                    'attivita',
                    'attivita',
                    'ragioneSociale',
                    'organizzazione',
                    'articoli',
                    'pagamento'
                ]),
            ], 201);
        } catch (QueryException $e) {
            // Gestione vincolo UNIQUE fallito (es. codice_esterno + attivita_id già esistenti)
            if (str_contains($e->getMessage(), 'UNIQUE') || $e->errorInfo[1] === 1062) {
                return response()->json([
                    'message' => 'Vendita già esistente per questa attività.',
                ], 409); // 409 Conflict
            }

            report($e);
            return response()->json([
                'message' => 'Errore di database durante la creazione della vendita.',
                'error' => config('app.debug') ? $e->getMessage() : 'Errore DB.'
            ], 500);
        } catch (\Throwable $e) {
            report($e);

            return response()->json([
                'message' => 'Errore durante la creazione della vendita.',
                'error' => config('app.debug') ? $e->getMessage() : 'Errore interno.'
            ], 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Vendita $vendita)
    {
        return view('pages.vendite.show', compact('vendita'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Vendita $vendita)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateVenditaRequest $request, Vendita $vendita)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Vendita $vendita)
    {
        //
    }
}

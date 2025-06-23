<?php

namespace App\Http\Controllers;

use App\Models\Vendita;
use App\Http\Requests\StoreVenditaRequest;
use App\Http\Requests\UpdateVenditaRequest;
use Illuminate\Http\JsonResponse;
use App\Services\Vendita\CreateVenditaService;

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
            'attivita.ragioneSociale.organizzazione',
            'articoli',
            'pagamento'
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
            $query->whereHas('attivita.ragioneSociale', function ($q) use ($ragioneSociale) {
                $q->where('azienda', 'like', "%$ragioneSociale%");
            });
        }
        if ($organizzazione = request('organizzazione')) {
            $query->whereHas('attivita.ragioneSociale.organizzazione', function ($q) use ($organizzazione) {
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
            // Validazione passata → salvataggio atomico tramite service
            $vendita = $this->createVenditaService->handle($request->validated());
            return response()->json([
                'message' => 'Vendita creata con successo.',
                'data' => $vendita->load([
                    'cliente',
                    'addetto',
                    'attivita',
                    'attivita.ragioneSociale.organizzazione',
                    'articoli',
                    'pagamento'
                ]),
            ], 201);
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
        //
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

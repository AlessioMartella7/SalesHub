<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\StoreVenditaRequest;
use App\Models\Vendita;
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
                'message' => 'Vendita creata con successo',
                'data' => $vendita->load([
                    'cliente',
                    'addetto',
                    'attivita',
                    'attivita.ragioneSociale.organizzazione',
                    'articoli',
                    'pagamenti'
                ]),
            ], 201);
        } catch (\Throwable $e) {
            report($e);

            return response()->json([
                'message' => 'Errore durante la creazione della vendita.',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}

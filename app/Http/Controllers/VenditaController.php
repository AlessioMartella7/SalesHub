<?php

namespace App\Http\Controllers;

use App\Models\Vendita;
use App\Http\Requests\StoreVenditaRequest;
use App\Http\Requests\UpdateVenditaRequest;
use Illuminate\Http\JsonResponse;

class VenditaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
                    'pagamenti'
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

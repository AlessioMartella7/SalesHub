<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\StoreVenditaRequest;
use Illuminate\Http\JsonResponse;
use App\Services\Vendita\CreateVenditaService;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Validator;
use App\Jobs\ProcessVenditeChunk;
use App\Models\Vendita;

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
            $validatedRequest = $request->validated();
            // Validazione passata → salvataggio atomico tramite service
            $vendita = $this->createVenditaService->handle($validatedRequest);
            return response()->json([
                'message' => 'Vendita creata con successo.',
                'id'=> $vendita->id,
/*                 'data' => $vendita->load([
                    'cliente',
                    'addetto',
                    'attivita',
                    'attivita',
                    'ragioneSociale',
                    'organizzazione',
                    'articoli',
                    'pagamento'
                ]), */
            ], 201);
        } catch (QueryException $e) {
            // Gestione vincolo UNIQUE fallito (es. codice_esterno + attivita_id già esistenti)
            if (str_contains($e->getMessage(), 'UNIQUE') || $e->errorInfo[1] === 1062) {
                return response()->json([
                    'message' => 'Vendita già esistente per questa attività.',
                    'exception' => config('app.debug') ? [
                        'message' => $e->getMessage(),
                        'errorInfo' => $e->errorInfo,
                        'code' => $e->getCode(),
                        'trace' => $e->getTraceAsString(),
                    ] : null,
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
     * Store a batch of newly created resources in storage.
     */
    public function storeBatch(Request $request): JsonResponse
    {
        $vendite = $request->input('vendite', []);
        $rules = (new StoreVenditaRequest())->rules();
        $messages = (new StoreVenditaRequest())->messages();

        $errors = [];
        $chunkSize = 100;

        // Validazione

        foreach (array_chunk($vendite, $chunkSize) as $chunk) {
            $validChunk = [];
            foreach ($chunk as $index => $data) {
                $validator = Validator::make($data, $rules, $messages);
                if ($validator->fails()) {
                    $errors[] = [
                        'index' => $index,
                        'validation_errors' => $validator->errors(),
                    ];
                } else {
                    $validChunk[] = $validator->validated();
                }
            }
            if (!empty($validChunk)) {
                ProcessVenditeChunk::dispatch($validChunk);
            }
        }

        return response()->json([
            'message' => 'Batch in elaborazione',
            'errori' => $errors,
        ], 202);
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

    // Annulla vendita
    public function annulla(Vendita $vendita)
    {
        $vendita->stato = 'ANNULLATA';
        $vendita->save();

        return response()->json([
            'message' => 'Vendita Annullata',
            'id' => $vendita->id,
            'stato' => $vendita->stato,
        ],200);
    }
}
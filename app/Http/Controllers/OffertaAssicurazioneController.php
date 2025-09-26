<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreImportRequest;
use App\Models\OffertaAssicurazione;
use Illuminate\Http\Request;
use App\Services\Import\ExcelToCsvService;
use App\Services\Import\Assicurazioni\CsvAssicurazioniChunkImporterService;
use App\Services\Import\ExcelHeaderCheckService;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Log;
use Throwable;

class OffertaAssicurazioneController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
            $query = OffertaAssicurazione::query();

        if (filled(request('codice_contratto'))) {
            $query->where('codice_contratto', 'like', '%' . request('codice_contratto') . '%');
        }
        if (filled(request('codice_pdv'))) {
            $query->where('codice_pdv', 'like', '%' . request('codice_pdv') . '%');
        }
        if (filled(request('pacchetto'))) {
            $query->where('pacchetto', 'like', '%' . request('pacchetto') . '%');
        }
        if (filled(request('categoria'))) {
            $query->where('categoria', 'like', '%' . request('categoria') . '%');
        }
        if (filled(request('stato_contratto'))) {
            $query->where('stato_contratto', 'like', '%' . request('stato_contratto') . '%');
        }
        if (filled(request('dt_from'))) {
            $query->whereDate('dt_inserimento', '>=', request('dt_from'));
        }
        if (filled(request('dt_to'))) {
            $query->whereDate('dt_inserimento', '<=', request('dt_to'));
        }

        $assicurazioni = $query->orderByDesc('dt_inserimento')->paginate(50);

        return view('pages.assicurazioni.index', compact('assicurazioni'));
    }

    /**
     * Display the specified resource.
     */
    public function show(OffertaAssicurazione $assicurazione)
    {
        return view('pages.assicurazioni.show', compact('assicurazione'));
    }

    /**
     * Show the form for importing a new resource.
     */
    public function import(StoreImportRequest $request, ExcelToCsvService $excelToCsv, CsvAssicurazioniChunkImporterService $importer, ExcelHeaderCheckService $headerCheckService)
    {
        $file = $request->file('import_file');
        $now = now()->format('Y-m-d H:i:s');
        $userID = auth()->id();
        $startTime = microtime(true);
        $expectedHeader = 'codice';

        // Salvo l’excel
        $name = $file->hashName();
        $file->storeAs('imports_excel', $name);
        $filePath = storage_path('app/private/imports_excel/' . $name);

        try {

        // Converto in CSV
        $csvFilePath = $excelToCsv->convert($filePath, $name);

        if (! $headerCheckService->checkHeaderFromCsv($csvFilePath, $expectedHeader)) {
            return back()
                ->withInput()
                ->with('error', 'Hai selezionato un file non valido per Assicurazioni.');
        }
        // Importo a chunk
        $importer->import($csvFilePath, $userID, $now);

        $duration = round(microtime(true) - $startTime, 2);

        Log::info('Importazione file completata', [
            'user_id'    => $userID,
            'filename'   => $name,
            'duration_s' => $duration,
            'created_at' => $now,
            ]);

        } catch (Throwable $e) {

            $errorMessage = App::environment('production')
            ? 'Errore durante l\'importazione del file '
            : 'Errore durante l\'importazione del file:' . $e->getMessage();

            Log::error('Errore nell importazione del file: ' . $e->getMessage(), ['exception' => $e]);

            return back()
                ->withInput()
                ->with(['error' => $errorMessage]);
        }

        // Cancello i files
        if (file_exists($filePath)) {
            @unlink($filePath);
        }

        if (file_exists($csvFilePath)) {
            @unlink($csvFilePath);
        }

        return redirect()
            ->route('import.form')
            ->with('success', "File importato con successo in: $duration secondi");
    }
}
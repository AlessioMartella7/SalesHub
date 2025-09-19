<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreImportRequest;
use App\Models\OffertaAssicurazione;
use Illuminate\Http\Request;
use App\Services\Import\ExcelToCsvService;
use App\Services\Import\CsvChunkImporter;
use Illuminate\Support\Facades\Log;
use PhpOffice\PhpSpreadsheet\IOFactory;
use Throwable;

class OffertaAssicurazioneController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(OffertaAssicurazione $offertaAssicurazione)
    {
        //
    }

    /**
     * Show the form for importing a new resource.
     */
    public function import(StoreImportRequest $request, ExcelToCsvService $excelToCsv, CsvChunkImporter $importer)
    {
        $file = $request->file('import_file');
        $now = now()->format('Y-m-d H:i:s');
        $userID = auth()->id();
        $startTime = microtime(true);

        try {
            $reader = IOFactory::createReaderForFile($file->getPathname());
            $reader->setReadDataOnly(true);
            $spreadsheet = $reader->load($file->getPathname());
            $worksheet = $spreadsheet->getActiveSheet();
            $firstRowArray = $worksheet->rangeToArray('A1:Z1', null, false, false, false);
            $firstRow = isset($firstRowArray[0]) ? $firstRowArray[0] : [];
            $firstHeader = strtolower(trim($firstRow[0] ?? ''));

            if ($firstHeader !== 'codice') {
                return back()
                    ->withInput()
                    ->with('error', 'Hai selezionato un file non valido per Assicurazioni.');
            }
        } catch (\Throwable $e) {
            return back()
                ->withInput()
                ->with('error', 'Errore nella lettura del file: ' . $e->getMessage());
        }

        try {
            // Salvo l’excel
            $name = $file->hashName();
            $file->storeAs('imports_excel', $name);
            $filePath = storage_path('app/private/imports_excel/' . $name);

            // Converto in CSV
            $csvFilePath = $excelToCsv->convert($filePath, $name);

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
            Log::error('Errore nell importazione del file: ' . $e->getMessage());
            return back()
                ->withInput()
                ->withErrors(['error' => 'Errore import: ' . $e->getMessage()]);
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
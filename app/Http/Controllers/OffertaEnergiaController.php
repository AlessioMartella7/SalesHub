<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreImportRequest;
use App\Jobs\OfferteImportExcelJob;
use App\Models\OffertaEnergia;
use Maatwebsite\Excel\Facades\Excel;

class OffertaEnergiaController extends Controller
{
    public function import(StoreImportRequest $request)
    {
        $file = $request->file('import_file');
        $userID = $request->user()->id;

        // ✅ Verifica intestazione (dealer_id)
        try {
            $data = Excel::toCollection(null, $file);
            $firstRow = $data->first()?->first();
            $firstHeader = strtolower(trim($firstRow[0] ?? ''));

            if ($firstHeader !== 'dealer id') {
                return back()
                    ->withInput()
                    ->with('error', 'Hai selezionato un file non valido per Energia. La prima colonna deve essere "dealer_id".');
            }
        } catch (\Throwable $e) {
            return back()
                ->withInput()
                ->with('error', 'Errore nella lettura del file: ' . $e->getMessage());
        }

        // ✅ Salvataggio file
        $fileName = $file->hashName();
        $filePath = $file->storeAs('excels_files', $userID . $fileName);
        $fullPath = storage_path('app/private/' . $filePath);

        // ✅ Dispatch del job in coda
        OfferteImportExcelJob::dispatch($filePath, $userID, $fullPath);

        return redirect()
            ->route('energia.import')
            ->with('success', 'File importato con successo, caricamento in corso in background');
    }
        /**
     * Display the specified resource.
     */
    public function show(OffertaEnergia $energia)
    {
        return view('pages.energia.show', compact('energia'));
    }
}

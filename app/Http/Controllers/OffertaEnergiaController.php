<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreImportRequest;
use App\Jobs\OfferteEnergiaImportExcel;
use App\Models\OffertaEnergia;
use PhpOffice\PhpSpreadsheet\IOFactory;

class OffertaEnergiaController extends Controller
{
    public function import(StoreImportRequest $request)
    {
        $file = $request->file('import_file');
        $userID = $request->user()->id;

        // Efficient header check
        try {
            $reader = IOFactory::createReaderForFile($file->getPathname());
            $reader->setReadDataOnly(true);
            $spreadsheet = $reader->load($file->getPathname());
            $worksheet = $spreadsheet->getActiveSheet();
            $firstRowArray = $worksheet->rangeToArray('A1:Z1', null, false, false, false);
            $firstRow = isset($firstRowArray[0]) ? $firstRowArray[0] : [];
            $firstHeader = strtolower(trim($firstRow[0] ?? ''));

            if ($firstHeader !== 'dealerid') {
                return back()
                    ->withInput()
                    ->with('error', 'Hai selezionato un file non valido per Energia.');
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
        OfferteEnergiaImportExcel::dispatch($filePath, $userID, $fullPath);

        return redirect()
            ->route('fissi.import')
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
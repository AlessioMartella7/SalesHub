<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreImportRequest;
use App\Jobs\OfferteImportExcelJob;
use App\Models\OffertaEnergia;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class OffertaEnergiaController extends Controller
{
    public function import(StoreImportRequest $request)
    {
            // Check tipo coerente
        if ($request->input('import_type') !== 'energia') {
            return back()->withInput()->with('error', 'Hai selezionato un tipo non coerente con il file caricato (Energia).');
        }

        $file = $request->file('import_file');
        $fileName = $file->hashName();
        $userID = $request->user()->id;

        // Salva il file
        $filePath = $file->storeAs('excels_files', $userID . $fileName);
        $fullPath = storage_path('app/private/' . $filePath);

        // Avvia il job in coda
        OfferteImportExcelJob::dispatch($filePath, $userID, $fullPath);

        return redirect()->route('energia.import')->with('success', 'File importato con successo, caricamento in corso in background');
    }
        /**
     * Display the specified resource.
     */
    public function show(OffertaEnergia $energia)
    {
        return view('pages.energia.show', compact('energia'));
    }
}

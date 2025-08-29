<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreImportRequest;
use App\Jobs\OfferteEnergiaImportExcel;
use App\Models\OffertaEnergia;
use PhpOffice\PhpSpreadsheet\IOFactory;

class OffertaEnergiaController extends Controller
{
    public function index()
    {
        $query = OffertaEnergia::query();

        if (filled(request('dealer_id'))) {
            $query->where('dealer_id', 'like', '%' . request('dealer_id') . '%');
        }
        if (filled(request('codice_contratto'))) {
            $query->where('codice_contratto', 'like', '%' . request('codice_contratto') . '%');
        }
        if (filled(request('ragione_sociale'))) {
            $query->where('ragione_sociale', 'like', '%' . request('ragione_sociale') . '%');
        }
        if (filled(request('codice_pdv'))) {
            $query->where('codice_pdv', 'like', '%' . request('codice_pdv') . '%');
        }
        if (filled(request('des_tipologia_commodity'))) {
            $query->where('des_tipologia_commodity', 'like', '%' . request('des_tipologia_commodity') . '%');
        }
        if (filled(request('dt_from'))) {
            $query->whereDate('dt_acquisizione_pdc', '>=', request('dt_from'));
        }
        if (filled(request('dt_to'))) {
            $query->whereDate('dt_acquisizione_pdc', '<=', request('dt_to'));
        }

        $energia = $query->orderByDesc('dt_acquisizione_pdc')->paginate(50);

        return view('pages.energia.index', compact('energia'));
    }

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
            ->route('import.form')
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
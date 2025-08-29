<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreImportRequest;
use App\Models\Fisso;
use App\Imports\FissiImportToModel;
use App\Jobs\FissiImportExcel;
use Illuminate\Support\Facades\Storage;
use Maatwebsite\Excel\Facades\Excel;
use PhpOffice\PhpSpreadsheet\IOFactory;

class FissoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $query = Fisso::query();

        if (filled(request('codice_contratto'))) {
            $query->where('codice_contratto', request('codice_contratto'));
        }

        if (filled(request('codice_pdv'))) {
            $query->where('codice_pdv', request('codice_pdv'));
        }

        if (filled(request('stato'))) {
            $query->where('stato', request('stato'));
        }

        if (filled(request('dt_from'))) {
            $query->where('dt_acquisizione', '>=', request('dt_from'));
        }

        if (filled(request('dt_to'))) {
            $query->where('dt_acquisizione', '<=', request('dt_to'));
        }

        $fissi = $query->paginate(50);

        return view('pages.fissi.index', compact('fissi'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Fisso $fisso)
    {
        return view('pages.fissi.show', compact('fisso'));
    }

    /** Import a new Excel file */
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
            $firstRow = $worksheet->rangeToArray('A1:Z1', null, true, false, false)[0];
            $firstHeader = strtolower(trim(reset($firstRow)));

            if ($firstHeader !== 'codice contratto') {
                return back()
                    ->withInput()
                    ->with('error', 'Hai selezionato un file non valido per Fissi.');
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

        // ✅ Scelta tra import immediato o via job (in base alla dimensione)
        if ($file->getSize() < 200 * 1024) {
            Excel::import(new FissiImportToModel($userID), $fullPath);
            Storage::delete($filePath);

            return redirect()
                ->route('import.form')
                ->with('success', 'File caricato con successo.');
        } else {
            FissiImportExcel::dispatch($filePath, $userID, $fullPath);

            return redirect()
                ->route('import.form')
                ->with('success', 'File importato con successo, caricamento in corso in background.');
        }
    }


}
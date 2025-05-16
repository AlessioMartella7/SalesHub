<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreImportRequest;
use App\Models\Fisso;
use App\Imports\FissiImport;
use App\Jobs\FissiImportExcel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Maatwebsite\Excel\Facades\Excel;

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

    public function importForm()
    {
        return view('pages.fissi.import');
    }

    /** Import a new Excel file */
    public function import(StoreImportRequest $request)
    {

        $file = $request->file('import_file');
        $fileSize = $file->getSize();
        $fileName = $file->hashName();
        $userID =  $request->user()->id;

        // Percoso da dove il file viene salvato
        $filePath = $file->storeAs('excels_files', $userID . $fileName);

        // Percorso in cui si trova il file
        $fullPath = storage_path('app/private/'. $filePath);
                // Se il file è più piccolo di X
        if ($fileSize < 200 * 1024) {
            Excel::import(new FissiImport($userID),$fullPath );
            // Elimina il file dopo l'importazione
            Storage::delete($filePath);
            $message = 'File caricato con successo';
        } else {

            // Avvia il job in coda
            FissiImportExcel::dispatch($filePath, $userID, $fullPath);
            $message = 'File importato con successo, caricamento in corso in background';
        }


        return redirect()->route('fissi.import')->with('success', $message);
    }

    /**
     * Display the specified resource.
     */
    public function show(Fisso $fisso)
    {
        return view('pages.fissi.show', compact('fisso'));
    }
}
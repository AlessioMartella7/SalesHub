<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreImportRequest;
use App\Models\OffertaAssicurazione;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PhpOffice\PhpSpreadsheet\IOFactory;

class OffertaAssicurazioneController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    public function import(StoreImportRequest $request)
    {
        $file = $request
            ->validated()
            ->file('import_file');
        $userID = $request->user()->id;
        $now = now();

        try {
            $name = $file->hashName();
            $path = $file->storeAs('imports_excel', $userID, $name);
            $fullPath = storage_path('app/private/' . $path);

            $spreadsheet = IOFactory::load($fullPath);

            $writer = IOFactory::createWriter($spreadsheet, 'Csv');
            $csvPath = storage_path('app/private/imports_csv/' . $userID);
            $csvFullPath = $csvPath . '/' . $name . '.csv';
            $writer->save($csvFullPath);

            $handle = fopen($csvFullPath, 'r');
            fgetcsv($handle); // salta intestazione

            $pdo = DB::connection()->getPdo();
            $stmt = $pdo->prepare(
                "INSERT INTO offerte_assicurazioni (
                    codice_pdv, codice_contratto, id_carrello, venditore, stato_contratto, attivato, metodo_pagamento,
                    dt_inserimento, dt_primo_pagamento, dt_cancellazione, categoria, pacchetto, esito_carrello,
                    causale_cancellazione, user_id, created_at, updated_at
                ) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)"
            );

            while (($line = fgetcsv($handle)) !== false) {
                $stmt->execute([
                    $line[0],  // codice_pdv
                    $line[1],  // codice_contratto
                    $line[2],  // id_carrello
                    $line[3],  // venditore
                    $line[4],  // stato_contratto
                    $line[5],  // attivato
                    $line[6],  // metodo_pagamento
                    $line[7],  // dt_inserimento
                    $line[8],  // dt_primo_pagamento
                    $line[9],  // dt_cancellazione
                    $line[10], // categoria
                    $line[11], // pacchetto
                    $line[12], // esito_carrello
                    $line[13], // causale_cancellazione
                    $userID,
                    $now,
                    $now
                ]);
            }
            fclose($handle);
        } catch (\Throwable $e) {
            return back()
                ->withInput()
                ->withErrors(['error' => 'Errore nella lettura del file: ' . $e->getMessage()]);
        }
        return back()->with('success', 'Importazione completata con successo.');
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
    public function store(Request $request)
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
     * Show the form for editing the specified resource.
     */
    public function edit(OffertaAssicurazione $offertaAssicurazione)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, OffertaAssicurazione $offertaAssicurazione)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(OffertaAssicurazione $offertaAssicurazione)
    {
        //
    }
}

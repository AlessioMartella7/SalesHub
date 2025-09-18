<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreImportRequest;
use App\Models\OffertaAssicurazione;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PhpOffice\PhpSpreadsheet\IOFactory;
use Illuminate\Support\Facades\Log;
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

    public function import(StoreImportRequest $request)
    {
        $file = $request
            ->file('import_file');
        $now = now()->format('Y-m-d H:i:s');
        $userID = auth()->id();

        try {
            $name = $file->hashName();
            $path = $file->storeAs('imports_excel/' . $name);
            $fullPath = storage_path('app/private/' . $path);

            $spreadsheet = IOFactory::load($fullPath);

            // Converto il file in CSV
            $writer = IOFactory::createWriter($spreadsheet, 'Csv');

            $csvPath = storage_path("app/private/imports_csv/");

            // Salvo il file CSV
            $csvFullPath = $csvPath . $name . '.csv';
            $writer->save($csvFullPath);

            // Leggo il file CSV
            $handle = fopen($csvFullPath, 'r');
            fgetcsv($handle); // salta intestazione

            // Preparo la query di inserimento
            $pdo = DB::connection()->getPdo();
            $stmt = $pdo->prepare(
                "INSERT INTO offerte_assicurazioni (
                    codice_pdv, codice_contratto, id_carrello, venditore, stato_contratto, attivato, metodo_pagamento,
                    dt_inserimento, dt_primo_pagamento, dt_cancellazione, categoria, pacchetto, esito_carrello,
                    causale_cancellazione, user_id, created_at, updated_at
                ) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)
                ON DUPLICATE KEY UPDATE
                    codice_pdv = VALUES(codice_pdv),
                    id_carrello = VALUES(id_carrello),
                    venditore = VALUES(venditore),
                    stato_contratto = VALUES(stato_contratto),
                    attivato = VALUES(attivato),
                    metodo_pagamento = VALUES(metodo_pagamento),
                    dt_inserimento = VALUES(dt_inserimento),
                    dt_primo_pagamento = VALUES(dt_primo_pagamento),
                    dt_cancellazione = VALUES(dt_cancellazione),
                    categoria = VALUES(categoria),
                    pacchetto = VALUES(pacchetto),
                    esito_carrello = VALUES(esito_carrello),
                    causale_cancellazione = VALUES(causale_cancellazione),
                    user_id = VALUES(user_id),
                    updated_at = VALUES(updated_at)"
            );
            Log::debug('Prepared Statement: ' . $stmt->queryString);
           while(($line = fgetcsv($handle)) !== false) {
                $stmt->execute([
                    $line[0], // codice_pdv
                    $line[1], // codice_contratto
                    $line[2], // id_carrello
                    $line[3], // venditore
                    $line[4], // stato_contratto
                    $line[5], // attivato
                    $line[6], // metodo_pagamento
                    $line[7] ? date('Y-m-d H:i:s', strtotime($line[7])) : null, // dt_inserimento
                    $line[8] ? date('Y-m-d H:i:s', strtotime($line[8])) : null, // dt_primo_pagamento
                    $line[9] ? date('Y-m-d H:i:s', strtotime($line[9])) : null, // dt_cancellazione
                    $line[10], // categoria
                    $line[11], // pacchetto
                    $line[12], // esito_carrello
                    $line[13], // causale_cancellazione
                    $userID,   // user_id
                    $now,      // created_at
                    $now       // updated_at
                ]);
           }

            fclose($handle);

        } catch (Throwable $e) {
        return back()
            ->withInput()
            ->withErrors(['error' => 'Errore nella lettura del file: ' . $e->getMessage()]);
        }
        return redirect()
            ->route('import.form')
            ->with('success', 'File importato con successo');
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
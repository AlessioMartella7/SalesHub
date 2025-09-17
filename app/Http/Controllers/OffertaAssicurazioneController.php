<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreImportRequest;
use App\Models\OffertaAssicurazione;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PhpOffice\PhpSpreadsheet\IOFactory;
use Illuminate\Support\Facades\Concurrency;
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

            // Creo la cartella se non esiste
            $csvPath = storage_path("app/private/imports_csv/{$name}");
                if (!is_dir($csvPath)) {
                mkdir($csvPath, 0777, true);
            }

            // Salvo il file CSV
            $csvFullPath = $csvPath . '/' . $name . '.csv';
            $writer->save($csvFullPath);

            // Leggo il file CSV
            $handle = fopen($csvFullPath, 'r');
            fgets($handle); // salta intestazione

            // Preparo la query di inserimento
            $pdo = DB::connection()->getPdo();
            $stmt = $pdo->prepare(
                "INSERT INTO offerte_assicurazioni (
                    codice_pdv, codice_contratto, id_carrello, venditore, stato_contratto, attivato, metodo_pagamento,
                    dt_inserimento, dt_primo_pagamento, dt_cancellazione, categoria, pacchetto, esito_carrello,
                    causale_cancellazione, user_id, created_at, updated_at
                ) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)"
            );

            $csvLines = fgetcsv($handle, 0, ',', '"');
            $tasks = [];

            foreach ($csvLines as $csvSingleLine) {

                $tasks[] = function () use ($stmt, $userID, $now, $csvSingleLine) {
                    try {
                        if(empty(array_filter($csvSingleLine))) {
                            return; // salta righe vuote
                        }
                        $stmt->execute([
                            $csvSingleLine[0],  // codice_pdv
                            $csvSingleLine[1],  // codice_contratto
                            $csvSingleLine[2],  // id_carrello
                            $csvSingleLine[3],  // venditore
                            $csvSingleLine[4],  // stato_contratto
                            $csvSingleLine[5],  // attivato
                            $csvSingleLine[6],  // metodo_pagamento
                            $csvSingleLine[7],  // dt_inserimento
                            $csvSingleLine[8],  // dt_primo_pagamento
                            $csvSingleLine[9],  // dt_cancellazione
                            $csvSingleLine[10], // categoria
                            $csvSingleLine[11], // pacchetto
                            $csvSingleLine[12], // esito_carrello
                            $csvSingleLine[13], // causale_cancellazione
                            $userID,
                            $now,
                            $now
                        ]);
                        Log::info('importazione riga CSV avvenuta con successo: {{contratto: '.$csvSingleLine[1].'}}');
                        return ['user_id' => $userID, 'status' => 'success', 'contratto' => $csvSingleLine[1]];

                    } catch (Throwable $e){
                        Log::error('errore importazione riga CSV: {{contratto: '.$csvSingleLine[1].'}} - '.$e->getMessage());
                        return ['user_id' => $userID, 'status' => 'failed', 'error'=> $e->getMessage()];
                    }
                };
            }
            fclose($handle);

            // Avvio la concorrenza
            Concurrency::run($tasks, ['maxProcesses' => 10, 'timeout' => 300]);


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

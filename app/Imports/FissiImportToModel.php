<?php

namespace App\Imports;

use App\Models\Fisso;
use Illuminate\Contracts\Queue\ShouldQueue;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithStartRow;
use Maatwebsite\Excel\Concerns\WithBatchInserts;
use Maatwebsite\Excel\Concerns\WithChunkReading;
use Maatwebsite\Excel\Concerns\WithUpserts;
use PhpOffice\PhpSpreadsheet\Shared\Date;
use Illuminate\Support\Carbon;

class FissiImportToModel implements ToModel, WithUpserts, WithStartRow, WithBatchInserts, WithChunkReading, ShouldQueue
{

    private int $userId;
    private $stopImport = false;

    public function __construct(int $userId)
    {
        $this->userId = $userId;
    }
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {

        // Se è stata trovata una riga vuota in precedenza, non fare più nulla
        if ($this->stopImport) {
            return null;
        }

        // Se la riga è completamente vuota, imposta lo stop
        if (empty($row[0]) && empty($row[1]) && empty($row[2]) && empty($row[3]) && empty($row[6]) && empty($row[9])) {
            $this->stopImport = true;
            return null;
        }

        return new Fisso([
            'user_id'                => $this->userId,
            'codice_contratto'       => $row[0],
            'stato'                  => $row[1],
            'market_segment'         => $row[2] ?? null,
            'codice_pdv'             => $row[3],
            'dt_acquisizione'        => $this->formatDate($row[6]),
            'dt_attivazione'         => $this->formatDate($row[9]),
            'offerta'                => $row[10] ?? null,
            'flag_la_lna'            => $row[11] ?? null,
            'piano_tariffario_macro' => $row[12] ?? null,
            'modalita_pagamento'     => $row[13] ?? null,
            'tipo_ko'                => $row[14] ?? null,
            'delay_giorni'           => $row[15] ?? null,
        ]);
    }

    // Escludo l'intestazione delle colonne
    public function startRow(): int
    {
        return 2; // inizia dalla riga 2
    }

    // Raggruppo in batch prima di inserire le righe
    public function batchSize(): int
    {
        return 1000;
    }

    // Indica quante righe devono essere lette per ogni blocco
    public function chunkSize(): int
    {
        return 1000;
    }

    // Definisce in base a quale dato effettuare l'upsert
    public function uniqueBy()
    {
        return 'codice_contratto';
    }

    // funzione per convertire la data nel formato accettato dal DB
    private function formatDate($date)
    {
        try {
            // Se è un numero, lo convertiamo da formato Excel
            if (is_numeric($date)) {
                return Date::excelToDateTimeObject($date)->format('Y-m-d');
            }

            // Convertiamo direttamente la data in formato 'DD/MM/YYYY' in 'YYYY-MM-DD'
            return Carbon::createFromFormat('d/m/Y', $date)->format('Y-m-d');
        } catch (\Exception $e) {
            return null;  // Se c'è un errore, ritorna null
        }
    }
}

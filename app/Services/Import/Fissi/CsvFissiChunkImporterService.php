<?php

namespace App\Services\Import\Fissi;

use App\Services\Import\CsvChunkImporterInterface;
use Illuminate\Support\Facades\DB;
use PDO;

class CsvFissiChunkImporterService implements CsvChunkImporterInterface
{
    public PDO $pdo;
    public int $batchSize;

    public function __construct(int $batchSize = 1000)
    {
        $this->pdo = DB::connection()->getPdo();
        $this->batchSize = $batchSize;
    }

    /**
     * Legge un CSV e lo importa a batch.
     */
    public function import(string $csvPath, int $userID, string $now): void
    {
        $handle = fopen($csvPath, 'r');
        fgets($handle); // salta intestazione

        DB::transaction(function () use ($handle, $userID, $now) {
            $rows = [];

            while (($line = fgetcsv($handle, 0, ',', '"')) !== false) {
                $rows[] = [
                    $line[0], // codice_contratto
                    $line[1], // stato
                    $line[2], // market_segment
                    $line[3], // codice_pdv
                    $line[6] ? date('Y-m-d', strtotime($line[6])) : null, // dt_acquisizione
                    $line[9] ? date('Y-m-d', strtotime($line[9])) : null, // dt_attivazione
                    $line[10], // offerta
                    $line[11], // flag_la_lna
                    $line[12], // piano_tariffario_macro
                    $line[13], // tipo_ko
                    $line[14], // modalita_pagamento
                    $line[15], // delay_giorni
                    $userID,
                    $now,
                    $now
                ];

                if (count($rows) === $this->batchSize) {
                    $this->insertBatch($rows);
                    $rows = [];
                    gc_collect_cycles();
                }
            }

            if (count($rows) > 0) {
                $this->insertBatch($rows);
            }
        });

        fclose($handle);
    }

    public function insertBatch(array $rows): void
    {
        $placeholders = rtrim(
            str_repeat('(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?),', count($rows)),
            ','
        );

        $sql = "INSERT INTO fissi (
                    codice_contratto, stato, market_segment, codice_pdv,
                    dt_acquisizione, dt_attivazione, offerta,
                    flag_la_lna, piano_tariffario_macro,
                    modalita_pagamento, tipo_ko, delay_giorni,
                    user_id, created_at, updated_at
                ) VALUES $placeholders
                ON DUPLICATE KEY UPDATE
                    stato = VALUES(stato),
                    market_segment = VALUES(market_segment),
                    codice_pdv = VALUES(codice_pdv),
                    dt_acquisizione = VALUES(dt_acquisizione),
                    dt_attivazione = VALUES(dt_attivazione),
                    offerta = VALUES(offerta),
                    flag_la_lna = VALUES(flag_la_lna),
                    piano_tariffario_macro = VALUES(piano_tariffario_macro),
                    modalita_pagamento = VALUES(modalita_pagamento),
                    tipo_ko = VALUES(tipo_ko),
                    delay_giorni = VALUES(delay_giorni),
                    user_id = VALUES(user_id),
                    updated_at = VALUES(updated_at)";

        $stmt = $this->pdo->prepare($sql);
        $stmt->execute(array_merge(...$rows));
    }
}
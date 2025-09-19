<?php

namespace App\Services\Import;

use Illuminate\Support\Facades\DB;
use PDO;
use Illuminate\Support\Facades\Log;

class CsvChunkImporter
{
    private PDO $pdo;
    private int $batchSize;

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

            while (($line = fgetcsv($handle)) !== false) {
                $rows[] = [
                    $line[0], $line[1], $line[2], $line[3], $line[4], $line[5], $line[6],
                    $line[7] ? date('Y-m-d H:i:s', strtotime($line[7])) : null,
                    $line[8] ? date('Y-m-d H:i:s', strtotime($line[8])) : null,
                    $line[9] ? date('Y-m-d H:i:s', strtotime($line[9])) : null,
                    $line[10], $line[11], $line[12], $line[13],
                    $userID, $now, $now
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

    private function insertBatch(array $rows): void
    {
        $placeholders = rtrim(str_repeat('(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?),', count($rows)), ',');

        $sql = "INSERT INTO offerte_assicurazioni (
                    codice_pdv, codice_contratto, id_carrello, venditore, stato_contratto, attivato, metodo_pagamento,
                    dt_inserimento, dt_primo_pagamento, dt_cancellazione, categoria, pacchetto, esito_carrello,
                    causale_cancellazione, user_id, created_at, updated_at
                ) VALUES $placeholders
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
                    updated_at = VALUES(updated_at)";

        $stmt = $this->pdo->prepare($sql);
        $stmt->execute(array_merge(...$rows));
    }
}
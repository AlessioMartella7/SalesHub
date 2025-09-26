<?php

namespace App\Services\Import\Energia;

use App\Services\Import\CsvChunkImporterInterface;
use Illuminate\Support\Facades\DB;
use PDO;

class CsvEnergiaChunkImporterService implements CsvChunkImporterInterface
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
                    $userID,
                    $line[0],  // dealer_id
                    $line[1],  // ragione_sociale
                    $line[2],  // codice_pdv
                    $line[3],  // codice_contratto
                    $line[4],  // num_item_in_pdc
                    $line[5],  // codice_contratto_esterno
                    $line[6] ? date('Y-m-d H:i:s', strtotime($line[6])) : null,
                    $line[7] ? date('Y-m-d H:i:s', strtotime($line[7])) : null,
                    $line[8] ? date('Y-m-d H:i:s', strtotime($line[8])) : null,
                    $line[9] ? date('Y-m-d H:i:s', strtotime($line[9])) : null,
                    $line[10] ? date('Y-m-d H:i:s', strtotime($line[10])) : null,
                    $line[11] ? date('Y-m-d H:i:s', strtotime($line[11])) : null,
                    $line[12] ? date('Y-m-d H:i:s', strtotime($line[12])) : null,
                    $line[13] ? date('Y-m-d H:i:s', strtotime($line[13])) : null,
                    $line[14] ? date('Y-m-d H:i:s', strtotime($line[14])) : null,
                    $line[15] ? date('Y-m-d H:i:s', strtotime($line[15])) : null,
                    $line[16] ? date('Y-m-d H:i:s', strtotime($line[16])) : null,
                    $line[17], $line[18], $line[19],
                    $line[20] ? date('Y-m-d H:i:s', strtotime($line[20])) : null,
                    $line[21], $line[22], $line[23], $line[24],
                    $line[25], $line[26], $line[27], $line[28],
                    $line[29], $line[30], $line[31], $line[32],
                    $line[33], // tipologia_prestazione
                    $now, $now
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
        // 37 campi totali
        $placeholders = rtrim(str_repeat('(' . rtrim(str_repeat('?, ', 37), ', ') . '),', count($rows)), ',');

        $sql = "INSERT INTO offerte_energia (
                    user_id, dealer_id, ragione_sociale, codice_pdv, codice_contratto, num_item_in_pdc, codice_contratto_esterno,
                    dt_creazione_pdc, dt_acquisizione_pdc, dt_annullamento_pdc, dt_aggiornamento_oli, dt_annullamento_oli,
                    dt_fine_ripensamento, dt_firma_pdc, dt_inserimento_oli, dt_attivazione, dt_cessazione, dt_decorrenza,
                    des_categoria_uso_pdc_item, des_causale_annullamento_oli, des_metodo_pagamento_pdc_item, dt_load,
                    des_causale_annullamento_pdc, des_nome_listino_pdc_item, des_stato_oli, des_tipologia_commodity,
                    flg_acquisizione_pdc, flg_annullamento_oli, flg_annullamento_pdc, flg_attivazione_asset, flg_cessazione_asset,
                    flg_chiusura_oli, flg_dual, flg_fisso_voce_customer, tipologia_prestazione,
                    created_at, updated_at
                ) VALUES $placeholders
                ON DUPLICATE KEY UPDATE
                    dealer_id = VALUES(dealer_id),
                    ragione_sociale = VALUES(ragione_sociale),
                    codice_pdv = VALUES(codice_pdv),
                    num_item_in_pdc = VALUES(num_item_in_pdc),
                    codice_contratto_esterno = VALUES(codice_contratto_esterno),
                    dt_creazione_pdc = VALUES(dt_creazione_pdc),
                    dt_acquisizione_pdc = VALUES(dt_acquisizione_pdc),
                    dt_annullamento_pdc = VALUES(dt_annullamento_pdc),
                    dt_aggiornamento_oli = VALUES(dt_aggiornamento_oli),
                    dt_annullamento_oli = VALUES(dt_annullamento_oli),
                    dt_fine_ripensamento = VALUES(dt_fine_ripensamento),
                    dt_firma_pdc = VALUES(dt_firma_pdc),
                    dt_inserimento_oli = VALUES(dt_inserimento_oli),
                    dt_attivazione = VALUES(dt_attivazione),
                    dt_cessazione = VALUES(dt_cessazione),
                    dt_decorrenza = VALUES(dt_decorrenza),
                    des_categoria_uso_pdc_item = VALUES(des_categoria_uso_pdc_item),
                    des_causale_annullamento_oli = VALUES(des_causale_annullamento_oli),
                    des_metodo_pagamento_pdc_item = VALUES(des_metodo_pagamento_pdc_item),
                    dt_load = VALUES(dt_load),
                    des_causale_annullamento_pdc = VALUES(des_causale_annullamento_pdc),
                    des_nome_listino_pdc_item = VALUES(des_nome_listino_pdc_item),
                    des_stato_oli = VALUES(des_stato_oli),
                    des_tipologia_commodity = VALUES(des_tipologia_commodity),
                    flg_acquisizione_pdc = VALUES(flg_acquisizione_pdc),
                    flg_annullamento_oli = VALUES(flg_annullamento_oli),
                    flg_annullamento_pdc = VALUES(flg_annullamento_pdc),
                    flg_attivazione_asset = VALUES(flg_attivazione_asset),
                    flg_cessazione_asset = VALUES(flg_cessazione_asset),
                    flg_chiusura_oli = VALUES(flg_chiusura_oli),
                    flg_dual = VALUES(flg_dual),
                    flg_fisso_voce_customer = VALUES(flg_fisso_voce_customer),
                    tipologia_prestazione = VALUES(tipologia_prestazione),
                    user_id = VALUES(user_id),
                    updated_at = VALUES(updated_at)";

        $stmt = $this->pdo->prepare($sql);
        $stmt->execute(array_merge(...$rows));
    }
}

<?php

namespace App\Imports;

use App\Models\OffertaEnergia;
use Illuminate\Contracts\Queue\ShouldQueue;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithUpserts;
use Maatwebsite\Excel\Concerns\WithStartRow;
use Maatwebsite\Excel\Concerns\WithBatchInserts;
use Maatwebsite\Excel\Concerns\WithChunkReading;
use PhpOffice\PhpSpreadsheet\Shared\Date;
use Illuminate\Support\Carbon;

class OfferteEnergiaImport implements ToModel, WithUpserts, WithBatchInserts, WithStartRow, WithChunkReading, ShouldQueue
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
        // Stop import if previous row was empty
        if ($this->stopImport) {
            return null;
        }

        // Stop import if current row is empty (adjust columns as needed)
        if (empty($row[0]) && empty($row[1]) && empty($row[2]) && empty($row[3]) && empty($row[4])) {
            $this->stopImport = true;
            return null;
        }

        return new OffertaEnergia([
            'user_id' => $this->userId,
            'dealer_id' => $row[0],
            'ragione_sociale' => $row[1] ?? null,
            'codice_pdv' => $row[2],
            'codice_contratto' => $row[3],
            'num_item_in_pdc' => $row[4] ?? null,
            'codice_contratto_esterno' => $row[5],
            'dt_creazione_pdc' => $this->formatDate($row[6] ?? null),
            'dt_acquisizione_pdc' => $this->formatDate($row[7] ?? null),
            'dt_annullamento_pdc' => $this->formatDate($row[8] ?? null),
            'dt_aggiornamento_oli' => $this->formatDate($row[9] ?? null),
            'dt_annullamento_oli' => $this->formatDate($row[10] ?? null),
            'dt_fine_ripensamento' => $this->formatDate($row[11] ?? null),
            'dt_firma_pdc' => $this->formatDate($row[12] ?? null),
            'dt_inserimento_oli' => $this->formatDate($row[13] ?? null),
            'dt_attivazione' => $this->formatDate($row[14] ?? null),
            'dt_cessazione' => $this->formatDate($row[15] ?? null),
            'dt_decorrenza' => $this->formatDate($row[16] ?? null),
            'des_categoria_uso_pdc_item' => $row[17] ?? null,
            'des_causale_annullamento_oli' => $row[18] ?? null,
            'des_metodo_pagamento_pdc_item' => $row[19] ?? null,
            'dt_load' => $this->formatDate($row[20] ?? null),
            'des_causale_annullamento_pdc' => $row[21] ?? null,
            'des_nome_listino_pdc_item' => $row[22] ?? null,
            'des_stato_oli' => $row[23] ?? null,
            'des_tipologia_commodity' => $row[24],
            'flg_acquisizione_pdc' => $row[25] ?? null,
            'flg_annullamento_oli' => $row[26] ?? null,
            'flg_annullamento_pdc' => $row[27] ?? null,
            'flg_attivazione_asset' => $row[28] ?? null,
            'flg_cessazione_asset' => $row[29] ?? null,
            'flg_chiusura_oli' => $row[30] ?? null,
            'flg_dual' => $row[31] ?? null,
            'flg_fisso_voce_customer' => $row[32] ?? null,
            'tipologia_prestazione' => $row[33] ?? null,
        ]);
    }

    public function startRow(): int
    {
        return 2; // skip header
    }

    public function batchSize(): int
    {
        return 1000;
    }

    public function chunkSize(): int
    {
        return 1000;
    }

    public function uniqueBy()
    {
        return ['codice_contratto', 'des_tipologia_commodity'];
    }

    private function formatDate($date)
    {
        try {
            if (is_numeric($date)) {
                return Date::excelToDateTimeObject($date)->format('Y-m-d');
            }
            if ($date && preg_match('/^\d{2}\/\d{2}\/\d{4}$/', $date)) {
                return Carbon::createFromFormat('d/m/Y', $date)->format('Y-m-d');
            }
            return $date ?: null;
        } catch (\Exception $e) {
            return null;
        }
    }
}

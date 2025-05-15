<?php

namespace App\Imports;

use App\Models\Fisso;
use Carbon\Carbon;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use PhpOffice\PhpSpreadsheet\Shared\Date;

class FissiImport implements ToCollection
{
    private int $userId;

    public function __construct(int $userId)
    {
        $this->userId = $userId;
    }

    /**
     * @param Collection $row
     *
     * @return \Illuminate\Database\Eloquent\Collection|null
     */
    public function collection(Collection $rows)

    {
        $data = [];
        $stopImport = false;

        // itero nella collection
        foreach ($rows as $index => $row) {

            // Salta la prima riga (header)
            if ($index === 0) {
                continue;
            }

            // Se è stata trovata una riga vuota, stoppa
            if ($stopImport) {
                break;
            }

            // Verifica se la riga è vuota
            if (empty($row[0]) && empty($row[1]) && empty($row[2]) && empty($row[3]) && empty($row[6]) && empty($row[9])) {
                $stopImport = true;
                continue;
            }

            $data[] = [
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
            ];
        }
        if (!empty($data)) {

            //suddivido in pezzi per facilitare l'invio di grandi file
            foreach (array_chunk($data, 500) as $chunk) {
                Fisso::upsert($chunk, ['codice_contratto']);
            }
        }
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

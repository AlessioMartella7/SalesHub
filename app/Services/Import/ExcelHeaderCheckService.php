<?php

namespace App\Services\Import;

class ExcelHeaderCheckService
{
    /**
     * Controlla che il primo campo dell'header del CSV sia quello atteso.
     * Ritorna true se corretto, false altrimenti.
     */
    public function checkHeaderFromCsv(string $csvPath, string $expectedHeader): bool
    {
        if (!file_exists($csvPath) || !is_readable($csvPath)) {
            return false;
        }

        if (($handle = fopen($csvPath, 'r')) === false) {
            return false;
        }

        // Legge solo la prima riga
        $headerRow = fgetcsv($handle);
        fclose($handle);

        if (!$headerRow || count($headerRow) === 0) {
            return false;
        }

        $firstHeader = strtolower(trim($headerRow[0]));

        return $firstHeader === strtolower(trim($expectedHeader));
    }
}

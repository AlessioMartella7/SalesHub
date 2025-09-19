<?php

namespace App\Services\Import;

use PhpOffice\PhpSpreadsheet\IOFactory;

class ExcelToCsvService
{
    /**
     * Converte un file Excel in CSV e ritorna il path del CSV.
     */
    public function convert(string $excelPath, string $name): string
    {
        $spreadsheet = IOFactory::load($excelPath);

        $csvPath = storage_path("app/private/imports_csv");
        if (!is_dir($csvPath)) {
            mkdir($csvPath, 0755);
        }

        $csvFilePath = $csvPath . '/' . pathinfo($name, PATHINFO_FILENAME) . '.csv';
        $writer = IOFactory::createWriter($spreadsheet, 'Csv');
        $writer->save($csvFilePath);

        // Libero memoria
        $spreadsheet->disconnectWorksheets();
        unset($spreadsheet);
        unset($writer);
        gc_collect_cycles();

        return $csvFilePath;
    }
}

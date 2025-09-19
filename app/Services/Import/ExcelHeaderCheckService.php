<?php

namespace App\Services\Import;
use PhpOffice\PhpSpreadsheet\IOFactory;

class ExcelHeaderCheckService {
    public function checkHeader(string $filePath, string $expectedHeader) : bool {

            $reader = IOFactory::createReaderForFile($filePath);
            $reader->setReadDataOnly(true);
            $spreadsheet = $reader->load($filePath);
            $worksheet = $spreadsheet->getActiveSheet();
            $firstRowArray = $worksheet->rangeToArray('A1:Z1', null, false, false, false);
            $firstRow = isset($firstRowArray[0]) ? $firstRowArray[0] : [];
            $firstHeader = strtolower(trim($firstRow[0] ?? ''));

            return $firstHeader === strtolower($expectedHeader);
    }
}
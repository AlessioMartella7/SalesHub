<?php

namespace App\Services\Import;

interface CsvChunkImporterInterface {
    public function import(string $csvPath, int $userID, string $now): void;
    public function insertBatch(array $rows) : void;
}
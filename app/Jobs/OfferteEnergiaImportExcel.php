<?php

namespace App\Jobs;

use App\Imports\OfferteEnergiaImport;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Storage;
use Maatwebsite\Excel\Facades\Excel;

class OfferteEnergiaImportExcel implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public string $filePath;
    public int $userId;
    public string $fullPath;

    /**
     * Create a new job instance.
     */
    public function __construct(string $filePath, int $userId, string $fullPath)
    {
        $this->filePath = $filePath;
        $this->userId = $userId;
        $this->fullPath = $fullPath;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        Excel::import(new OfferteEnergiaImport($this->userId), $this->fullPath);

        // elimina dal disco "local", che punta a storage/app/private
        Storage::disk('local')->delete($this->filePath);
    }
}
<?php

namespace App\Jobs;

use App\Services\Vendita\CreateVenditaService;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class ProcessVenditeChunk implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public array $venditeChunk;

    public function __construct(array $venditeChunk)
    {
        $this->venditeChunk = $venditeChunk;
    }

    public function handle(CreateVenditaService $service)
    {
        foreach ($this->venditeChunk as $data) {
            try {
                $service->handle($data);
            } catch (\Throwable $e) {
                \Log::error('Errore durante l\'elaborazione della vendita:', [
                    'message' => $e->getMessage(),
                    'data' => $data,
                    'exception' => config('app.debug') ? [
                        'errorInfo' => $e->getTrace(),
                        'code' => $e->getCode(),
                    ] : null,
                ]);
                throw $e;
            }
        }
    }
}

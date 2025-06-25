<?php

namespace App\Services\Vendita\SubServices;

use App\Models\Domanda;
use App\Models\Risposta;
use App\Models\ArticoloDettaglio;

class CreateDomandaRispostaService
{
        public function create(ArticoloDettaglio $dettaglio, array $domande): void
    {
        foreach ($domande as $d) {
            try {
                // Trova o crea la domanda
                $domanda = Domanda::firstOrCreate([
                    'testo' => $d['testo']
                ]);
            } catch (QueryException $e) {
                // In caso di occorrenza, recupera la domanda esistente
                $domanda = Domanda::where('testo', $d['testo'])->first();
            }

            // Aggiorna o crea la risposta associata all'articolo dettaglio
            Risposta::updateOrCreate(
                [
                    'domanda_id' => $domanda->id,
                    'articolo_dettaglio_id' => $dettaglio->id,
                ],
                [
                    'risposta' => $d['risposta'] ?? null,
                ]
            );
        }
    }
}

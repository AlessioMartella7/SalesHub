<div class="col-12 my-4">

    <table class="table table-bordered border-dark">
        <thead>
            <tr class="fw-bold fs-4 text-center">
                <th colspan="13" class="table-secondary border-dark">
                    <h3>Articoli</h3>
                </th>
            </tr>
            <tr class="fw-bold fs-5 text-center table-light border-dark ">
                <th>Categoria</th>
                <th>Tipologia</th>
                <th>Tipo</th>
                <th>Codice</th>
                <th>Codice EAN</th>
                <th>Codice Univoco</th>
                <th>Descrizione</th>
                <th>Marca</th>
                <th>Modello</th>
                <th>Brand ID</th>
                <th>Costo Acquisto</th>
                <th>Aliquota Acquisto</th>
                <th>Dettagli</th>

            </tr>
        </thead>
        <tbody>
            @foreach ($vendita->articoli as $index => $articolo)
                {{-- Riga principale --}}
                <tr class="text-center">
                    <td>{{ $articolo->categoria->categoria }}</td>
                    <td>{{ $articolo->tipologia->tipologia }}</td>
                    <td>{{ $articolo->tipo }}</td>
                    <td>{{ $articolo->codice }}</td>
                    <td>{{ $articolo->codice_ean }}</td>
                    <td>{{ $articolo->codice_univoco }}</td>
                    <td>{{ $articolo->descrizione }}</td>
                    <td>{{ $articolo->marca }}</td>
                    <td>{{ $articolo->modello }}</td>
                    <td>{{ $articolo->brand_id }}</td>
                    <td>{{ $articolo->costo_acquisto }}</td>
                    <td>{{ $articolo->aliquota_acquisto }}</td>
                    <td>
                        <button class="btn btn-sm btn-outline-primary" type="button" data-bs-toggle="collapse"
                            data-bs-target="#collapse-{{ $index }}">
                            <i class="fa fa-eye"></i>
                        </button>
                    </td>
                </tr>

                @php
                    $dettaglioArticolo = $articolo->articoloDettaglio;
                @endphp

                {{-- Riga dei dettagli espandibile --}}
                <tr class="collapse" id="collapse-{{ $index }}">
                    <td colspan="13" class="bg-light text-start">
                        <h5 class="fw-bold">Dettagli Aggiuntivi:</h5>

                        <ul class="mb-0 my-2">

                            <li><strong>Tipologia Vendita:</strong>
                                {{ $dettaglioArticolo->tipologia_vendita ?? '-' }}
                            </li>

                            <li><strong>Canone:</strong>
                                {{ $dettaglioArticolo->canone ?? '-' }} €
                            </li>

                            <li><strong>Prezzo:</strong>
                                {{ $dettaglioArticolo->prezzo ?? '-' }} €
                            </li>

                            <li><strong>Aliquota Prezzo:</strong>
                                {{ $dettaglioArticolo->aliquota_prezzo ?? '-' }} €
                            </li>

                            <li><strong>Natura:</strong>
                                {{ $dettaglioArticolo->natura ?? '-' }}
                            </li>

                            <li><strong>Importo Imponibile:</strong>
                                {{ $dettaglioArticolo->importo_imponibile ?? '-' }} €
                            </li>

                            <li><strong>Sconto:</strong>
                                {{ $dettaglioArticolo->sconto ?? '-' }} €
                            </li>
                            <li><strong>Sconto Iva Esclusa:</strong>
                                {{ $dettaglioArticolo->sconto_iva_esclusa ?? '-' }} €
                            </li>

                            <li><strong>Importo Anticipo:</strong>
                                {{ $dettaglioArticolo->importo_anticipo ?? '-' }} €
                            </li>

                            <li><strong>Importo Finanziato:</strong>
                                {{ $dettaglioArticolo->importo_finanziato ?? '-' }} €
                            </li>

                            <li><strong>Importo Credito:</strong>
                                {{ $dettaglioArticolo->importo_credito ?? '-' }} €
                            </li>
                            <li><strong>Importo NDC:</strong>
                                {{ $dettaglioArticolo->importo_ndc ?? '-' }} €
                            </li>

                            <li><strong>Importo Scontrino:</strong>
                                {{ $dettaglioArticolo->importo_scontrino ?? '-' }} €
                            </li>

                            <li><strong>Importo Info 1:</strong>
                                {{ $dettaglioArticolo->vendita_info1 ?? '-' }}
                            </li>

                            <li><strong>Importo Info 2:</strong>
                                {{ $dettaglioArticolo->vendita_info2 ?? '-' }}
                            </li>

                            <li><strong>Importo Info 3:</strong>
                                {{ $dettaglioArticolo->vendita_info3 ?? '-' }}
                            </li>

                            <li><strong>Importo Info 4:</strong>
                                {{ $dettaglioArticolo->vendita_info4 ?? '-' }}
                            </li>

                            <li><strong>Importo Info 5:</strong>
                                {{ $dettaglioArticolo->vendita_info5 ?? '-' }}
                            </li>

                            @php
                                $dettaglioArticolo = $articolo->articoloDettaglio;

                                // Raggruppo per domanda_id
                                $rispostePerDomanda = $dettaglioArticolo->risposte->groupBy(function ($risposta) {
                                    return $risposta->domanda->id ?? null;
                                });
                            @endphp

                        </ul>

                        @if ($rispostePerDomanda->count())
                            <h5 class="my-2 fw-bold">Step di Vendita:</h5>
                            <ul>
                                @foreach ($rispostePerDomanda as $domandaId => $risposte)
                                    {{-- Recupero l'oggetto Domanda alla quale la prima risposta nella collection appartiene tramite relazione --}}
                                    @php $domanda = $risposte->first()->domanda; @endphp
                                    <li>
                                        <strong>{{ $domanda->testo ?? 'Domanda non trovata' }}</strong>
                                        <ul>
                                            @foreach ($risposte as $risposta)
                                                <li>
                                                    <span>{{ $risposta->risposta }}</span>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </li>
                                @endforeach
                            </ul>
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

                    <div class="col-12 my-4">

                        <table class="table table-bordered border-dark">
                            <thead>
                                <tr class="fw-bold fs-4 text-center">
                                    <th colspan="13" class="table-secondary border-dark">
                                        Articoli
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
                                            <button class="btn btn-sm btn-outline-primary" type="button"
                                                data-bs-toggle="collapse"
                                                data-bs-target="#collapse-{{ $index }}">
                                                <i class="fa fa-eye"></i>
                                            </button>
                                        </td>
                                    </tr>

                                    {{-- Riga dei dettagli espandibile --}}
                                    <tr class="collapse" id="collapse-{{ $index }}">
                                        <td colspan="13" class="bg-light text-start">
                                            <strong>Dettagli Aggiuntivi:</strong><br>
                                            <ul class="mb-0">

                                                <li><strong>Tipologia Vendita:</strong>
                                                    {{ $articolo->articoloDettaglio->tipologia_vendita ?? '-' }}
                                                </li>

                                                <li><strong>Canone:</strong>
                                                    {{ $articolo->articoloDettaglio->canone ?? '-' }} €
                                                </li>

                                                <li><strong>Prezzo</strong>
                                                    {{ $articolo->articoloDettaglio->prezzo ?? '-' }} €
                                                </li>

                                                <li><strong>Aliquota Prezzo:</strong>
                                                    {{ $articolo->articoloDettaglio->aliquota_prezzo ?? '-' }} €
                                                </li>

                                                <li><strong>Natura:</strong>
                                                    {{ $articolo->articoloDettaglio->natura ?? '-' }}
                                                </li>

                                                <li><strong>Importo Imponibile:</strong>
                                                    {{ $articolo->articoloDettaglio->importo_imponibile ?? '-' }} €
                                                </li>

                                                <li><strong>Sconto:</strong>
                                                    {{ $articolo->articoloDettaglio->sconto ?? '-' }} €
                                                </li>
                                                <li><strong>Sconto Iva Esclusa:</strong>
                                                    {{ $articolo->articoloDettaglio->sconto_iva_esclusa ?? '-' }} €
                                                </li>

                                                <li><strong>Importo Anticipo:</strong>
                                                    {{ $articolo->articoloDettaglio->importo_anticipo ?? '-' }} €
                                                </li>

                                                <li><strong>Importo Finanziato:</strong>
                                                    {{ $articolo->articoloDettaglio->importo_finanziato ?? '-' }} €
                                                </li>

                                                <li><strong>Importo Credito:</strong>
                                                    {{ $articolo->articoloDettaglio->importo_credito ?? '-' }} €
                                                </li>
                                                <li><strong>Importo NDC:</strong>
                                                    {{ $articolo->articoloDettaglio->importo_ndc ?? '-' }} €
                                                </li>

                                                <li><strong>Importo Scontrino:</strong>
                                                    {{ $articolo->articoloDettaglio->importo_scontrino ?? '-' }} €
                                                </li>

                                                <li><strong>Importo Info 1:</strong>
                                                    {{ $articolo->articoloDettaglio->vendita_info1 ?? '-' }}
                                                </li>

                                                <li><strong>Importo Info 2:</strong>
                                                    {{ $articolo->articoloDettaglio->vendita_info2 ?? '-' }}
                                                </li>

                                                <li><strong>Importo Info 3:</strong>
                                                    {{ $articolo->articoloDettaglio->vendita_info3 ?? '-' }}
                                                </li>

                                                <li><strong>Importo Info 4:</strong>
                                                    {{ $articolo->articoloDettaglio->vendita_info4 ?? '-' }}
                                                </li>

                                                <li><strong>Importo Info 5:</strong>
                                                    {{ $articolo->articoloDettaglio->vendita_info5 ?? '-' }}
                                                </li>
                                            </ul>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

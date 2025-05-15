@extends('layouts.main')

@section('content')
    <main>
        <div class="container">
            <div class="row d-flex justify-content-center">
                <div class="col-12 my-3 w-50">
                    <div class="text-center my-5">
                        <h2>Dettagli Fisso </h2>
                    </div>

                    {{-- Card Dettagli --}}
                    <div class="card shadow-sm">
                        <div class="card-header fw-bold fs-5">
                            Contratto - {{ $fisso->codice_contratto }}
                        </div>
                        <div class="card-body">
                            <div class="mb-3">
                                <strong>Codice PDV:</strong> {{ $fisso->codice_pdv }}
                            </div>
                            <div class="mb-3">
                                <strong>Stato:</strong> {{ $fisso->stato }}
                            </div>
                            <div class="mb-3">
                                <strong>Market Segment:</strong> {{ $fisso->market_segment }}
                            </div>
                            <div class="mb-3">
                                <strong>Data Attivazione:</strong> {{ $fisso->dt_attivazione }}
                            </div>
                            <div class="mb-3">
                                <strong>Offerta:</strong> {{ $fisso->offerta }}
                            </div>
                            <div class="mb-3">
                                <strong>Flag LA/LNA:</strong> {{ $fisso->flag_la_lna }}
                            </div>
                            <div class="mb-3">
                                <strong>Piano Tariffario:</strong> {{ $fisso->piano_tariffario_macro }}
                            </div>
                            <div class="mb-3">
                                <strong>Modalità Pagamento:</strong> {{ $fisso->modalita_pagamento }}
                            </div>
                            <div class="mb-3">
                                <strong>Delay Giorni:</strong> {{ $fisso->delay_giorni }}
                            </div>
                        </div>
                    </div>

                    {{-- Bottone ritorno --}}
                    <div class="text-center">
                        <a href="{{ url()->previous() }}" class="btn btn-lg btn-primary mt-3">Indietro</a>
                    </div>

                </div>
            </div>
        </div>
    </main>
@endsection
